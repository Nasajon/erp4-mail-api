<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Nasajon\AppBundle\NsjMail\Exceptions\EmailInvalidoException;
use Nasajon\AppBundle\NsjMail\Repository\ConfiguracaoSmtpRepository;
use Psr\Log\LoggerInterface;

class ConfiguracaoSmtpService {

    /**     
     * @var ConfiguracaoSmtpRepository
     */
    private $repository;

    /**     
     * @var PasswordService
     */
    private $passwordService;
    
    /**     
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ConfiguracaoSmtpRepository $repository, PasswordService $passwordService, LoggerInterface $logger) {
        $this->repository = $repository;
        $this->passwordService = $passwordService;
        $this->logger = $logger;
    }

    public function getRepository() : ConfiguracaoSmtpRepository {
        return $this->repository;
    }

    /**
     * Método responsável por persistir as informações no banco de dados, caso o email enviado não esteja atrelado a outro tenant.     
     * @param array $data
     * @return array
     */
    public function insert(array $data) : array {

        if($this->validateEmail($data['usuario'])) {
            
            if($this->verificaSeOEmailNaoExiste($data['usuario'], $data['tenant_id'])) {
                
                $data['senha'] = $this->passwordService->encrypt($data['senha']);
                return $this->getRepository()->insert($data);            
            }

            $this->logger->error("O email '{$data['usuario']}' já está cadastrado para o tenant: {$data['tenant_id']} ");
            throw new EmailInvalidoException("Este email já está cadastrado para outro tenant.", 400);

        }

    }

    /**
     * Método responsável por verificar se o email já existe para outro tenant.     
     * @param string $email
     * @param integer $tenant
     * @return boolean
     */
    private function verificaSeOEmailNaoExiste(string $email, int $tenant) : bool {

        $data = $this->getRepository()->find($email, $tenant);

        if(!$data) {
            return true;
        }

        return false;
        
    }

    /**
     * Método responsável por validar um email.     
     * @param string $email
     * @return boolean
     */
    private function validateEmail(string $email) : bool {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailInvalidoException("O email '{$email}' é inválido.", 400);
        }

        return true;
    }
}