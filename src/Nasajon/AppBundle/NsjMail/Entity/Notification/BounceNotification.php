<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation as JMS;

/**
 * Emails
 *
 */
class BounceNotification extends Notification {

    /**
     * @JMS\Type("Nasajon\AppBundle\NsjMail\Entity\Notification\Bounce")
     * @JMS\SerializedName("bounce")
     */
    private $bounce;

    public function __construct() {
        $this->bounce = new Bounce();
    }

    public function getBounce() {
        return $this->bounce;
    }

    public function setBounce($bounce) {
        $this->bounce = $bounce;
        return $this;
    }

    public function getType() {
        return 'Bounce';
    }

}
