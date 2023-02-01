<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoExeception;
use Nasajon\AppBundle\NsjMail\Repository\EmailsRepository;
use Nasajon\AppBundle\NsjMail\Messages\EnvioMessage;
use Psr\Log\LoggerInterface;

class EmailsService {

    /**     
     * @var EmailsRepository
     */
    private $repository;

    /**     
     * @var CriaEmailService
     */
    private $criaEmailService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(EmailsRepository $repository, CriaEmailService $criaEmailService, LoggerInterface $logger) {
        $this->repository = $repository;
        $this->criaEmailService = $criaEmailService;
        $this->logger = $logger;
    }

    public function getTemplateByCodigo(string $codigo, int $tenant) {
        return $this->repository->findTemplateByCodigo($codigo, $tenant);
    }

    /**
     * Retorna um array com dados do Remetente
     * @param String $remetente - Identificador do Remetente
     * @return @array
     */
    public function getRemetenteByID($remetente) : array {
        return $this->repository->findRemetenteByID($remetente);
    }


    public function validateEmails(array $emails) {

        foreach ($emails as $email) {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new EmailInvalidoExeception('Email inválido: ' . ($email??" null "), 400);
            }
        }
    }
    

    public function queueMail($tenant, $sistema, $from, $to, $template, $tags, $attachments, $attachments_names, $attachments_content_types) {

        $to = $this->filterBlacklistedEmails($to);

        if (count($to) < 1 ) {
            return;
        }

        $this->criaEmailService->criaEmail($tenant,
            null, $sistema, $from, $to, $template["codigo"], $template["assunto"],
            $template["conteudo"], EnvioMessage::TIPO_REAL, $tags, null, '', $attachments, $attachments_names, $attachments_content_types
        );

    }

    public function isBlacklisted($email) : bool {

        $data = $this->repository->findBlacklistedEmail($email);
        return count($data) > 0;

    }

    public function filterBlacklistedEmails(array $to) : array {

        foreach($to as $key=>$email){

            if ( $this->isBlackListed($email)){
                unset($to[$key]);
            }
        }

        return array_values($to);
    }

}