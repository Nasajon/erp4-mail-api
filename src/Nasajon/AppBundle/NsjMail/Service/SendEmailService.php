<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Nasajon\AppBundle\NsjMail\Exceptions\EmailDominioInvalidoException;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Psr\Log\LoggerInterface;

class SendEmailService {

    /**     
     * @var LoggerInterface
     */
    private $logger;

    /**     
     * @var EmailSmtpService
     */
    private $emailSmtpService;

    /** 
     * @var EmailSesService
     */
    private $emailSesService;

    /**     
     * @var bool
     */
    private $isSmtp;

    public function __construct(LoggerInterface $logger, EmailSmtpService $emailSmtpService, EmailSesService $emailSesService) {
        $this->logger = $logger;        
        $this->emailSmtpService = $emailSmtpService;
        $this->emailSesService = $emailSesService;
    }

    /**
     * Informa ao receiver se o email será enviado via SMTP ou SES.     
     * @return boolean
     */
    public function getIsSmtp() : bool {
        return $this->isSmtp;
    }


    public function sendEmail(EnvioMessage $message) {

        $this->isSmtp = false;

        if (empty($message->getTo())) {
            $this->logger->warning("Endereço do destinatário de email inválido.", $this->envioMessageToArray($message));
            return false;
        }

        //Indica que o email foi enviado via SMTP e aborta a execução.
        if($this->emailSmtpService->enviar($message)) {
            $this->isSmtp = true;
            return;
        }

        //Valida se o email é de domínio da nasajon.
        if(!$this->validaDominioSes($message->getFrom())) {
            throw new EmailDominioInvalidoException("O domínio informado é inválido.", 400);
        }
        
        //Envia via SES.
        return $this->emailSesService->enviar($message);
    }

    /**
     * Método responsável por validar o email via SES. Somente com o domínio da Nasajon.
     * @param array $emails
     * @return boolean
     */
    private function validaDominioSes(string $email) : bool {
        return strpos($email, "@nasajon.com.br") ? true : false;
    }

    private function envioMessageToArray(EnvioMessage $message){
        return [
            "Tenant" => $message->getTenant(),
            "Sistema" => $message->getSistema(),
            "tipo" => $message->getTipo(),
            "Campanha" => $message->getCampanha(),
            "Contato" => $message->getContato(),
            "DataCadastro" => $message->getDatacadastro(),
            "From" => $message->getFrom(),
            "Subject" => $message->getSubject()
        ];
    }

}