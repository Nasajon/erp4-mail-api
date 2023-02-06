<?php

namespace Nasajon\AppBundle\NsjMail\Repository;

use Doctrine\ORM\EntityRepository;

class BounceRepository extends EntityRepository {


    /**
     * Inicia uma transação
     */
    public function begin(){
        $this->getEntityManager()->getConnection()->beginTransaction();
        $this->getEntityManager()->getConnection()->setAutoCommit(false);
    }

    /**
     * Finaliza a transação aberta
     */
    public function commit(){
        $this->getEntityManager()->getConnection()->commit();
    }

    /**
     * Cancela a transação aberta
     */
    public function rollback(){
        $this->getEntityManager()->getConnection()->rollBack();
    }

    /**
     *
     * @return Connection $connection
     */
    public function getConnection() {
        return $this->getEntityManager()->getConnection();
    }


    public function gravaDados($rows) {

        $queryBounces = "INSERT INTO email.bounces (bounce, feedbackid, "
                . "tipobounce,subtipobounce,messageid ,"
                . "datahora,emailremetente ,tenant ,emaildestinatario) values ";

        $chunks = array_chunk($rows, 100);
        $this->getEntityManager()->getConnection()->beginTransaction();

        foreach ($chunks as $chunk) {
            $paramsBounce = array();
            $queryBounceParams = array();
            foreach ($chunk as $bounce) {
                $queryBounceParams[] = "(uuid_generate_v4(), ?, ?, ?, ?, ?, ?, ?, ?)";

                $paramsBounce[] = $bounce['feedbackid'];
                $paramsBounce[] = $bounce['tipobounce'];
                $paramsBounce[] = $bounce['subtipobounce'];
                $paramsBounce[] = $bounce['messageid'];
                $paramsBounce[] = $bounce['datahora'];
                $paramsBounce[] = $bounce['emailremetente'];
                $paramsBounce[] = $bounce['tenant'];
                $paramsBounce[] = $bounce['emaildestinatario'];
            }

            $queryBouncesToExecute = $queryBounces . implode(", ", $queryBounceParams);
            $this->getEntityManager()->getConnection()->executeQuery($queryBouncesToExecute, $paramsBounce);

        }
        $this->getEntityManager()->getConnection()->commit();
    }

    public function processaBouncesPermanentesParaBlacklist(){

        $sql = "SELECT * FROM email.api_bouncespermanentesparablacklist();";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);

        $stmt->execute();

    }

    public function processaBouncesTransientsParaBlacklist(){

        $sql = "SELECT * FROM email.api_bouncestransientesparablacklist();";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);

        $stmt->execute();

    }

}