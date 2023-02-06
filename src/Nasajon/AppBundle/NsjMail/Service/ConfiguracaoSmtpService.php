<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoException;
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
            
            if($this->verificaSeOEmailJaExiste($data['usuario'], $data['tenant_id'])) {
                
                $data['senha'] = $this->passwordService->encrypt($data['senha']);
                return $this->getRepository()->insert($data);            
            }

            throw new EmailInvalidoException("Este email já está cadastrado para outro tenant.", 500);

        }

    }

    private function verificaSeOEmailJaExiste(string $email, int $tenant) : bool {

        $data = $this->getRepository()->find($email, $tenant);

        if(!$data) {
            return true;
        }

        return false;
        
    }

    private function validateEmail(string $email) : bool {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailInvalidoException("O email '{$email}' é inválido.", 400);
        }

        return true;
    }
}