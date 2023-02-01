<?php

namespace Nasajon\AppBundle\NsjMail\Validator\Constraints;

use Symfony\Component\Validator\Constraints\AbstractComparison;

/**
 * @Annotation
 */
class StreamSize extends AbstractComparison
{

    const TOO_HIGH_ERROR = '079d7420-2d13-460c-8756-de810eeb37d2';

    protected static $errorNames = array(
        self::TOO_HIGH_ERROR => 'TOO_HIGH_ERROR',
    );

	public $message = 'Tamanho de arquivo excede o máximo de {{ compared_value }}.';
}