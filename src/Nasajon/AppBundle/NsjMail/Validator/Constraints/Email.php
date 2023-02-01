<?php

namespace Nasajon\AppBundle\NsjMail\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Email extends Constraint
{
	public $message = 'E-mail "%string%" inválido.';
}