<?php

namespace Nasajon\AppBundle\NsjMail\Receiver;

use Bernard\Producer;
use Nasajon\AppBundle\NsjMail\Entity\Envios;
use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoExeception;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Nasajon\AppBundle\NsjMail\Service\SendEmailService;
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
     * @var Bernard\Producer
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
            //$this->emailsService->validateEmails($emailsValidate);

            //Envio do Email
            $result = $this->sendEmailService->sendEmail($message);

            if(!$this->sendEmailService->getIsSmtp()) {

                $envio = new Envios();
                $envio->setMessageId($result->get('MessageId'));
                $envio->setTenant($message->getTenant());
                $envio->setDataEnvio(new \DateTime());
                $this->registry->getEntityManager("target")->persist($envio);
                $this->registry->getEntityManager("target")->flush();
            }


        } catch (EmailInvalidoExeception $e) {

            $this->logger->error('Email inválido', [
                'queue' => __FUNCTION__,
                'erro' => $e->getMessage(),
                'tenant' => $message->getTenant(),
                'sistema' => $message->getSistema(),
                'codigo' => $message->getCodigoTemplate(),
                'to' => $message->getTo()
            ]);
            $this->producer->produce($message);

        } catch (\Exception $e) {

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
}
