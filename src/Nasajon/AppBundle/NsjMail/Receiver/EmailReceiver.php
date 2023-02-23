<?php

namespace Nasajon\AppBundle\NsjMail\Receiver;

use Bernard\Producer;
use Doctrine\DBAL\DBALException;
use Nasajon\AppBundle\NsjMail\Entity\Envios;
use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoException;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Nasajon\AppBundle\NsjMail\Service\SendEmailService;
use PhpAmqpLib\Exception\AMQPConnectionClosedException;
use Doctrine\DBAL\ConnectionException as DBALConnectionException;
use Nasajon\AppBundle\NsjMail\Exceptions\EmailDominioInvalidoException;
use Psr\Log\LoggerInterface;


class EmailReceiver {

    /**
     * @var SendEmailService
     */
    private $sendEmailService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    private $registry;

    /**
     * @var Producer
     */
    private $producer;

    public function __construct(LoggerInterface $logger, SendEmailService $sendEmailService, $registry, Producer $producer)
    {
        $this->sendEmailService = $sendEmailService;
        $this->logger = $logger;
        $this->registry = $registry;
        $this->producer = $producer;
    }

    //Fila Responsável por receber e processar as solicitações de envio de e-mail
    //command: app/console bernard:consume --env=dev -vvv send-mail --stop-on-error
    public function envio(EnvioMessage $message)
    {
        try {
            //Teste das informações mínimas para o envio
            if (empty($message->getTo()) || empty($message->getFrom()) ) {
                $this->logger->error('Dados mínimos não enviados', [
                    'queue' => __FUNCTION__,
                    'erro' => 'Dados mínimos não enviados',
                    'tenant' => $message->getTenant(),
                    'sistema' => $message->getSistema(),
                    'codigo' => $message->getCodigoTemplate(),
                    'to' => $message->getTo()
                ]);
                return;
            }

            //Teste para Validar a lista de e-mails
            $emailsValidate = array_merge($message->getTo(),
                !$message->getReplyto() ? [] : $message->getReplyto(),
                !$message->getCc() ? [] : $message->getCc(),
                !$message->getBcc() ? [] : $message->getBcc());
            array_push($emailsValidate, $message->getFrom());
            //Envio do Email
            $result = $this->sendEmailService->sendEmail($message);

            if(!$this->sendEmailService->getIsSmtp()) {

                $envio = new Envios();
                $envio->setMessageId($result->get('MessageId'));
                $envio->setTenant($message->getTenant());
                $envio->setDataEnvio(new \DateTime());
                $this->registry->getEntityManager("default")->persist($envio);
                $this->registry->getEntityManager("default")->flush();
            }


        } catch (EmailInvalidoException $e) {

            $this->logger->error('Email inválido', [
                'queue' => __FUNCTION__,
                'erro' => $e->getMessage(),
                'tenant' => $message->getTenant(),
                'sistema' => $message->getSistema(),
                'codigo' => $message->getCodigoTemplate(),
                'to' => $message->getTo()
            ]);

        } catch(AMQPConnectionClosedException $e) {

            $this->logger->error('Erro de comunicação com o RabbitMQ, reinicializando...', [
                'queue' => __FUNCTION__,
                'exception' => get_class($e),
                'error' => $e->getMessage(),
                'dados' => $this->emailMessageToArray($message)
            ]);
            
            die($e->getMessage());

        } catch(DBALException $e) {

            if($e->getPrevious() instanceof DBALConnectionException) {
                $this->logger->error('Erro de comunicação com o banco', [
                    'queue' => __FUNCTION__,
                    'exception' => get_class($e),
                    'error' => $e->getMessage(),
                    'dados' => $this->emailMessageToArray($message)
                ]);

                $this->producer->produce($message);

            }else {
                
                $this->logger->error('Falha ao enviar o email', [
                    'queue' => __FUNCTION__,
                    'exception' => get_class($e),
                    'erro' => $e->getMessage(),
                    'dados' => $this->emailMessageToArray($message)
                ]);

                throw $e;
            }

        }catch(EmailDominioInvalidoException $e) {
            
            $this->logger->error('O domínio informado é inválido.', [
                'queue' => __FUNCTION__,
                'error' => $e->getMessage(),
                'tenant' => $message->getTenant(),
                'email' => $message->getFrom()
            ]);

        }catch (\Exception $e) {
            $this->logger->error('Falha ao enviar e-mail', [
                'queue' => __FUNCTION__,
                'erro' => $e->getMessage(),
                'tenant' => $message->getTenant(),
                'sistema' => $message->getSistema(),
                'codigo' => $message->getCodigoTemplate(),
                'to' => $message->getTo()
            ]);
            
            $this->producer->produce($message);
        }
    }

    private function emailMessageToArray(EnvioMessage $message) : array {
        return [
            'from' => $message->getFrom(),
            'to' => $message->getTo(),
            'cc' => $message->getCc(),
            'bcc' => $message->getBcc(),
            'body' => $message->getBody(),
            'attachments' => $message->getAttachments(),
        ];
    }
}
