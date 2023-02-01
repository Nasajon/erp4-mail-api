<?php

namespace Nasajon\AppBundle\NsjMail\Repository;

class EmailsRepository extends AbstractRepository {

    public function findTemplateByCodigo($codigo, $tenant) {

        $sql = "SELECT
        t0_.template,
        t0_.codigo,
        t0_.conteudo,
        t0_.assunto,
        t0_.remetente
        FROM maladireta.templates t0_
        WHERE (t0_.codigo = :codigo
        AND t0_.tenant = :tenant)
        OR
        (t0_.codigo = :codigo
        AND t0_.tenant is null)
        ORDER BY t0_.tenant ASC;
        ";

        $templates = $this->getConnection()
        ->executeQuery($sql, [
        'codigo' => $codigo,
        'tenant' => $tenant])->fetchAll();

        if(count($templates) > 0){
            return $templates[0];
        }

        return $templates;
    }

     /**
     * Retorna um remetente pelo seu ID
     * @param String $remetente - Id do remetente
     * @return array
     */
    public function findRemetenteByID($remetente) : array
    {
        $sql = "SELECT
        t0_.remetente,
        t0_.tenant,
        t0_.email,
        t0_.nome,
        t0_.envio_ativo,
        t0_.recepcao_ativa,
        t0_.padrao,
        t0_.interno
        FROM maladireta.remetentes t0_
        WHERE remetente = :remetente;";

        return $this->getConnection()->executeQuery($sql, ["remetente" => $remetente ])->fetch();

    }

    public function findBlacklistedEmail($email){

        $sql = "SELECT
        t0_.blacklistemail,
        t0_.email,
        t0_.created_at,
        t0_.expiracao
        FROM maladireta.blacklistemails t0_
        WHERE lower(email) = :email;";

        return $this->getConnection()->executeQuery($sql, ["email" => strtolower($email) ])->fetchAll();

    }


}

