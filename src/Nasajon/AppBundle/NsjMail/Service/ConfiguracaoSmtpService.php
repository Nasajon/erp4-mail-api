<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoExeception;
use Nasajon\AppBundle\NsjMail\Repository\ConfiguracaoSmtpRepository;

class ConfiguracaoSmtpService {

    /**     
     * @var ConfiguracaoSmtpRepository
     */
    private $repository;

    /**     
     * @var PasswordService
     */
    private $passwordService;

    public function __construct(ConfiguracaoSmtpRepository $repository, PasswordService $passwordService) {
        $this->repository = $repository;
        $this->passwordService = $passwordService;
    }

    public function getRepository() : ConfiguracaoSmtpRepository {
        return $this->repository;
    }

    public function insert(array $data) : array {

        if($this->validateEmail($data['usuario'])) {
            $data['senha'] = $this->passwordService->encrypt($data['senha']);
            return $this->getRepository()->insert($data);            
        }

    }

    private function validateEmail(string $email) : bool {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailInvalidoExeception("O email '{$email}' é inválido.", 400);
        }

        return true;
    }
}