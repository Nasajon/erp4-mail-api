<?php

namespace Nasajon\AppBundle\NsjMail\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Nasajon\AppBundle\NsjMail\Entity\Smtp;

class ConfiguracaoSmtpRepository {

    /**     
     * @var Connection
     */
    private $connection;

    /**     
     * @var EntityManager
     */
    private $em;

    public function __construct(Connection $connection, EntityManager $em) {
        $this->connection = $connection;
        $this->em = $em;
    }

    /**     
     * @return Connection
     */
    public function getConnection() : Connection {
        return $this->connection;
    }

    /**
     * Undocumented function     
     * @return EntityManager
     */
    public function getEntityManager() : EntityManager {
        return $this->em;
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return array
     */
    public function insert(array $data) : array {        

        $smtp = new \Nasajon\AppBundle\NsjMail\Entity\Smtp();
        $smtp->setNome($data["nome"]);
        $smtp->setHost($data["host"]);
        $smtp->setUsuario($data["usuario"]);
        $smtp->setSenha($data['senha']);
        $smtp->setPort($data["port"]);
        $smtp->setTenantId($data["tenant_id"]);

        $this->getEntityManager()->persist($smtp);
        $this->getEntityManager()->flush();

        return $this->smtpEntityToArray($smtp);
        
    } 
    /**
     * Método responsável por converter o objeto Smtp em um array.     
     * @param Smtp $smtp
     * @return array
     */
    private function smtpEntityToArray(Smtp $smtp) : array {
        return [
            'nome' => $smtp->getNome(),
            'host' => $smtp->getHost(),
            'usuario' => $smtp->getUsuario(),
            'senha' => $smtp->getSenha(),
            'port' => $smtp->getPort(),
            'tenant_id' => $smtp->getTenantId(),
        ];
    }

}