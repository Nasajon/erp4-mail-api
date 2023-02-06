<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation as JMS;


/**
 *
 * @JMS\Discriminator(field = "eventType", disabled = false, map = {
 *              "Bounce": "Nasajon\AppBundle\NsjMail\Entity\Notification\BounceNotification",
 *              "Complaint": "Nasajon\AppBundle\NsjMail\Entity\Notification\ComplaintNotification"
 * })
 */
abstract class Notification {

    /**
     * @JMS\Type("Nasajon\AppBundle\NsjMail\Entity\Notification\Mail")
     * @JMS\SerializedName("mail")
     */
    private $mail;

    public function __construct() {
        $this->mail = new Mail();
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
        return $this;
    }

    public abstract function getType();
}
