<?php

namespace Nasajon\AppBundle\NsjMail\Service;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException;
use Defuse\Crypto\Key;
use Psr\Log\LoggerInterface;

class PasswordService {

    /**     
     * @var string
     */
    private $salt;

    /**     
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(string $salt, LoggerInterface $logger) {
        $this->salt = $salt;
        $this->logger = $logger;
    }

    /**
     * Método responsável por encriptar uma string.     
     * @param string $val
     * @return string
     */
    public function encrypt(string $val) : string {
        return Crypto::encrypt($val, $this->getKey());
    }

    /**
     * Método responsável por decriptar uma string.     
     * @param string $val
     * @return string
     */
    public function decrypt(string $val) : string {
        try {
            return Crypto::decrypt($val, $this->getKey());
        }catch(WrongKeyOrModifiedCiphertextException $e) {
            $this->logger->warning("Chave de criptogragia inválida. {$e->getMessage()}");
        }
    }

    /**
     * Método responsável por retornar a chave de criptografica.
     * Para gerar a chave, basta executar:
     * php vendor/bin/generate-defuse-key
     * @return Key
     */
    private function getKey() : Key {        
        return Key::loadFromAsciiSafeString($this->salt);
    }

}

