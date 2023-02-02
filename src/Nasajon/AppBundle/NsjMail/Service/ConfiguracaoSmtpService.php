<?php

namespace Nasajon\AppBundle\NsjMail\Service;

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
        $data['senha'] = $this->passwordService->encrypt($data['senha']);
        return $this->getRepository()->insert($data);
    }
    
}