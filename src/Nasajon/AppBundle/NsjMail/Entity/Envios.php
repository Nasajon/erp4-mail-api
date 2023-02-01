<?php

namespace Nasajon\AppBundle\NsjMail\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Envios
 *
 * @ORM\Table(name="maladireta.envios")
 * @ORM\Entity(repositoryClass="NNasajon\AppBundle\NsjMail\Repository\EnviosRepository")
 */
class Envios {

    /**
     * Constantes
     */
    const ENTIDADE = "Envios";
    const STATUS_AGUARDANDO = 0;
    const STATUS_ENVIANDO = 1;
    const STATUS_ENVIADO = 2;
    const STATUS_ERRO = 3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataenvio", type="datetime")
     */
    private $dataenvio;

    /**
     * @var string
     *
     * @ORM\Column(name="messageid", type="text")
     * @ORM\Id
     */
    private $messageid;

    /**
     * @var string
     *
     * @ORM\Column(name="tenant", type="bigint", nullable=true)
     */
    private $tenant;

    /**
     * Set dataenvio
     *
     * @param \DateTime $dataenvio
     * @return Envio
     */
    public function setDataEnvio($dataenvio) {
        $this->dataenvio = $dataenvio;
        return $this;
    }

    /**
     * Get dataenvio
     *
     * @return \DateTime
     */
    public function getDataEnvio() {
        return $this->dataenvio;
    }

    /**
     * Set messageid
     *
     * @param string $messageid
     * @return Envio
     */
    public function setMessageId($messageid) {
        $this->messageid = $messageid;
        return $this;
    }

    /**
     * Get messageid
     *
     * @return string
     */
    public function getMessageId() {
        return $this->messageid;
    }

    /**
     * Set tenant
     *
     * @param string $tenant
     * @return Envio
     */
    public function setTenant($tenant) {
        $this->tenant = $tenant;
        return $this;
    }

    /**
     * Get tenant
     *
     * @return string
     */
    public function getTenant() {
        return $this->tenant;
    }

}