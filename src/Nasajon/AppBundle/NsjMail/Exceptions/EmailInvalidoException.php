<?php

namespace Nasajon\AppBundle\NsjMail\Exceptions;

class EmailInvalidoExeception extends \Exception
{

    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
