<?php

namespace Nasajon\AppBundle\NsjMail\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="NNasajon\AppBundle\NsjMail\Repository\ConfiguracaoSmtpRepository")
 * @ORM\Table(name="diretorio.tenants_smtp")
 */
class Smtp {

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="guid", nullable=true)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;
        
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", nullable=false)     
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", nullable=false)     
     */
    private $host;
    
    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", nullable=false)     
     */
    private $usuario;
    
    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", nullable=false)     
     */
    private $senha;
    
    /**
     * @var int
     *
     * @ORM\Column(name="port", type="smallint", nullable=false)     
     */
    private $port;
    
    /**
     * @var int
     *
     * @ORM\Column(name="tenant_id", type="smallint", nullable=false)     
     */
    private $tenant_id;
    
    public function getId() {
        return $this->id;
    }

        
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getNome() {
        return $this->nome;
    }

  
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

   
    public function getHost() {
        return $this->host;
    }

  
    public function setHost($host) {
        $this->host = $host;
        return $this;
    }

    public function getUsuario() {
        return $this->usuario;
    }

   
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
        return $this;
    }

 
    public function getSenha() {
        return $this->senha;
    }

   
    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

 
    public function getPort() {
        return $this->port;
    }

    
    public function setPort($port) {
        $this->port = $port;

        return $this;
    }

    public function getTenantId() {
        return $this->tenant_id;
    }

   
    public function setTenantId($tenant_id) {
        $this->tenant_id = $tenant_id;
        return $this;
    }
}