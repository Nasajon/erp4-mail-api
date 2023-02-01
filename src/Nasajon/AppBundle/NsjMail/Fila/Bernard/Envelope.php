<?php

namespace Nasajon\AppBundle\NsjMail\Fila\Bernard;

use Bernard\Envelope as EnvelopeBernard;
use JMS\Serializer\Annotation as JMS;
use function Gaufrette\Adapter\time;
use Nasajon\AppBundle\NsjMail\Messages\AbstractMessage as Message;

/**
 * Wraps a Message with metadata that can be used for automatic retry
 * or inspection.
 *
 */
class Envelope  extends EnvelopeBernard {
  /**
   *
   * @JMS\Type("Nasajon\AppBundle\NsjMail\Messages\AbstractMessage")
   */
  protected $message;

  /**
   *
   * @JMS\Type("string")
   */
  protected $class;

  /**
   *
   * @JMS\Type("integer")
   */
  protected $timestamp;
  /**
   * @param Message $message
   */
  public function __construct(Message $message) {
    $this->message = $message;
    $this->class = get_class($message);
    $this->timestamp = time();
  }
  /**
   * @return Message
   */
  public function getMessage() {
    return $this->message;
  }
  /**
   * @return string
   */
  public function getName() {
    return $this->message->getName();
  }
  /**
   * @return string
   */
  public function getClass() {
    return $this->class;
  }
  /**
   * @return int
   */
  public function getTimestamp() {
    return $this->timestamp;
  }
}