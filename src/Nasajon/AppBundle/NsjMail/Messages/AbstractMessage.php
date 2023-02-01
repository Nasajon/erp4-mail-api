<?php

namespace Nasajon\AppBundle\NsjMail\Messages;

use Bernard\Message\AbstractMessage as AbstractMessageBernard;
use Bernard\Util;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(field = "type", disabled = false, map = {
 *    "EnvioMessage"  : "Nasajon\AppBundle\NsjMail\Messages\EnvioMessage",
 * })
 */
abstract class AbstractMessage extends AbstractMessageBernard
{

  /**
   * @JMS\Exclude()
   */
  private $type;

  /**
   *
   * @JMS\SerializedName("timestamp")
   * @JMS\Type("integer")
   */
  private $timestamp;

  /**
   *
   * @JMS\Type("string")
   */
  private $versao;

  function getTimestamp()
  {
    return $this->timestamp;
  }

  function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }

  function getVersao()
  {
    return $this->versao;
  }

  function setVersao($versao)
  {
    $this->versao = $versao;
  }
}