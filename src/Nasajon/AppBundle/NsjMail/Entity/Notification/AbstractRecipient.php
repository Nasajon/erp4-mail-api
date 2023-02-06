<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

/**
 *
 */
abstract class AbstractRecipient {

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("emailAddress")
     */
    private $emailAddress;

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
        return $this;
    }

}