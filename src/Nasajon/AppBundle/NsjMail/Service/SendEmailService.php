<?php

namespace Nasajon\AppBundle\NsjMail\Service;

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
     * Informa ao receiver se o email foi feito via SMTP ou SES.     
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

        // Envia via Amazon SES.
        return $result = $this->emailSesService->enviar($message);
        
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

