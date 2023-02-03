<?php

namespace Nasajon\AppBundle\NsjMail\Repository;

use Doctrine\DBAL\Connection;

class EmailsSmtpRepository extends AbstractRepository {

    /**     
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection) {
        $this->connection = $connection;        
    }

    public function getConnection() : Connection {
        return $this->connection;
    }

    public function getConfiguracoesSmtp(string $email, int $tenant) {

        $sql = "SELECT nome, host, usuario, senha, port, tenant_id
        FROM email.tenants_configuracoes_smtp
        WHERE usuario = :usuario AND tenant_id = :tenant_id";
        

        return $this->getConnection()->executeQuery($sql, ["usuario" => $email, "tenant_id" => $tenant ])->fetch();

    }
}