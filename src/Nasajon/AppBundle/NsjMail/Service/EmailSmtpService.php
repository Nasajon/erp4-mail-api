<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Gaufrette\Adapter;
use Nasajon\AppBundle\NsjMail\Exceptions\EmailPortaInvalidaException;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Nasajon\AppBundle\NsjMail\Repository\EmailsSmtpRepository;
use Psr\Log\LoggerInterface;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class EmailSmtpService {

    private const MAIL_BODY_TYPE = "text/html";
    private const MAIL_SSL = 465;
    private const MAIL_TLS = 587;
    private const MAIL_DEFAULT = 25;

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

    /**     
     * @var PasswordService
     */
    private $passwordService;

    public function __construct(EmailsSmtpRepository $repository, LoggerInterface $logger, string $cacheDir, $adapter, PasswordService $passwordService) {
        $this->repository = $repository;
        $this->logger = $logger;
        $this->cacheDir = $cacheDir;
        $this->adapter = $adapter;
        $this->passwordService = $passwordService;
    }

    public function getRepository() : EmailsSmtpRepository {
        return $this->repository;
    }

    public function enviar(EnvioMessage $message) : bool {

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

        //Decripta a senha.
        $senha = $this->passwordService->decrypt($smtpData['senha']);        

        //Faz autenticação no servidor SMTP.
        $transport = (new Swift_SmtpTransport($this->montaUrlTransport($smtpData['port'], $smtpData['host']), $smtpData['port']))
        ->setUsername($smtpData['usuario'])
        ->setPassword($senha);

        //Necessário adicionar a encryption quando a porta for 587
        if($smtpData['port'] == 587) {
            $transport->setEncryption("tls");
        }

        $mailer = new Swift_Mailer($transport);

        //Cria o email.
        $mail = (new Swift_Message($message->getSubject()))
        ->setFrom($message->getFrom(), $smtpData['nome'])
        ->setTo($message->getTo())
        ->setCc($message->getCc())
        ->setBcc($message->getBcc())
        ->setReplyTo($message->getReplyto())
        ->setBody($message->getBody(), self::MAIL_BODY_TYPE);

        //Verifica se há anexos.
        if(!empty($message->getAttachments())) {

            $messageAttachmentName = $message->getAttachmentsNames();
            $messageContentType = $message->getAttachmentsContentTypes();
            
            foreach($message->getAttachments() as $key => $attachment) {

                $attachmentName = $messageAttachmentName[$key]; 
                $attachmentContent = $this->getAttachmentContent($attachment);
                $attachmentContentType = $messageContentType[$key];
        
                $attach = (new Swift_Attachment())
                ->setBody($attachmentContent)
                ->setFilename($attachmentName)
                ->setContentType($attachmentContentType);
                
                $mail->attach($attach);
            }
        }

        //Envia o email
        if($mailer->send($mail) > 0) {
            $this->logger->info("O email foi enviado com sucesso.");
            return true;
        }

        return false;
    }

    /**
     * Recupera o anexo do adapter local ou de produção e verifica se o conteúdo é base64 ou não.     
     * @param string $path
     * @return string
     */
    private function getAttachmentContent(string $path) : string {

        if(method_exists($this->adapter, 'getUrl')) {
            return $this->isBase64(file_get_contents($this->adapter->getUrl($path))) ? base64_decode(file_get_contents($this->adapter->getUrl($path))) : file_get_contents($this->adapter->getUrl($path));
        }

        return $this->isBase64($path) ? base64_decode($this->adapter->read($path)) : $this->adapter->read($path);
    }

    /**
     * Método responsável por montar a URL de transport, para evitar o uso do Sendmail     
     * @param integer $port
     * @param string $host
     * @return string
     * @throws EmailPortaInvalidaException
     */
    private function montaUrlTransport(int $port, string $host) : string {

        switch($port) {

            case self::MAIL_SSL:
                $host = "tls://{$host}";
                break;

            case self::MAIL_TLS:
                $host = $host;
                break;

            case self::MAIL_DEFAULT:
                $host = $host;
                break;

            default:
                throw new EmailPortaInvalidaException("A porta do email é inválida.", 400);
                break;
        }

        return $host;

    }

    /**
     * Método responsável por converter o objeto Mensagem para um Array (Apenas para logs)     
     * @param EnvioMessage $message
     * @return array
     */
    private function emailMessageToArray(EnvioMessage $message) : array {
        return [
            'tenant' => $message->getTenant(),
            'from' => $message->getFrom(),
            'to' => $message->getTo(),
            'template' => $message->getCodigoTemplate()
        ];
    }

    /**
     * Regex para validar se o conteúdo é um base64.
     * @param string $value - Conteúdo com encode base64.
     * @return boolean
     */
    private function isBase64(string $value) : bool {
      return (bool) preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $value);
    }
}