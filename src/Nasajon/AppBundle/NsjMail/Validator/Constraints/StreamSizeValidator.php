<?php

namespace Nasajon\AppBundle\NsjMail\Validator\Constraints;

use Symfony\Component\Validator\Constraints\AbstractComparisonValidator;


class StreamSizeValidator extends AbstractComparisonValidator
{
	/**
	 * Calcula o tamanho de um arquivo em bytes
	 */
	private function calcSize($value){

	    return mb_strlen($value, '8bit');
	}

	/**
     * {@inheritdoc}
     */
    protected function compareValues($value1, $value2)
    {
        $dado = $this->calcSize($value1) <= $value2;
        return $dado;
	}

    /**
     * {@inheritdoc}
     */
    protected function getErrorCode()
    {
        return StreamSize::TOO_HIGH_ERROR;
    }
}
