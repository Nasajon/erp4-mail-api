<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Gaufrette\Adapter;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Nasajon\AppBundle\NsjMail\Repository\EmailsSmtpRepository;
use Psr\Log\LoggerInterface;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class EmailSmtpService {

    private const MAIL_BODY = "text/html";

    /**     
     * @var EmailsSmtpRepository
     */
    private $repository;

    /**     
     * @var LoggerInterface
     */
    private $logger;

    /**     
     * @var string
     */
    private $cacheDir;

    
    private $adapter;

    public function __construct(EmailsSmtpRepository $repository, LoggerInterface $logger, string $cacheDir, $adapter) {
        $this->repository = $repository;
        $this->logger = $logger;
        $this->cacheDir = $cacheDir;
        $this->adapter = $adapter;
    }

    public function getRepository() : EmailsSmtpRepository {
        return $this->repository;
    }

    public function enviar(EnvioMessage $message) {

        //Verifica se a mensagem possui tenant
        if(empty($message->getTenant())) {
            return false;
        }

        //Carrega os dados do SMTP do usuário.
        $smtpData = $this->getRepository()->getConfiguracoesSmtp($message->getFrom(), $message->getTenant());

        //Verifica se possui registro na tabela de SMTP.
        if(!$smtpData) {
            return false;
        }

        $this->logger->info("Tentativa de envio de email via SMTP", $this->emailMessageToArray($message));

        //Faz autenticação no servidor SMTP.
        $transport = (new Swift_SmtpTransport($this->montaUrlTransport($smtpData['port'], $smtpData['host']), $smtpData['port']))
        ->setUsername($smtpData['usuario'])
        ->setPassword($smtpData['senha']);

        $mailer = new Swift_Mailer($transport);

        //Cria o email.
        $mail = (new Swift_Message($message->getSubject()))
        ->setFrom($message->getFrom(), $smtpData['nome'])
        ->setTo($message->getTo())
        ->setCc($message->getCc())
        ->setBcc($message->getBcc())
        ->setReplyTo($message->getReplyto())
        ->setBody($message->getBody(), self::MAIL_BODY);

        //Verifica se há anexos.
        if(!empty($message->getAttachments())) {

            $messageContentType = $message->getAttachmentsContentTypes();

            foreach($message->getAttachments() as $key => $attachment) {

                $attachmentPath = "{$this->cacheDir}/{$attachment}";
                $contentType = $messageContentType[$key];

                if(method_exists($this->adapter, 'getUrl')) {
                    $attachmentPath = $this->adapter->getUrl($attachment);
                }

                $mail->attach(Swift_Attachment::fromPath($attachmentPath, $contentType)
                ->setFilename($this->adapter->read($attachment)));
            }

        }

        if($mailer->send($mail) > 0) {
            $this->logger->info("O email foi enviado com sucesso.");
            return true;
        }

        return false;
    }

    private function montaUrlTransport(int $port, string $host) : string {

        switch($port) {

            case 465:
                $host = "ssl://{$host}";
                break;

            case 587:
                $host = "tls://{$host}";
                break;

            case 25:
                $host = $host;
                break;

        }

        return $host;

    }

    private function emailMessageToArray(EnvioMessage $message) : array {
        return [
            'tenant' => $message->getTenant(),
            'from' => $message->getFrom(),
            'to' => $message->getTo(),
            'template' => $message->getCodigoTemplate()
        ];
    }
}