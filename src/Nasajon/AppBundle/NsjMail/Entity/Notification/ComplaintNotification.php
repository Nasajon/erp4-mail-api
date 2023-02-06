<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation as JMS;

/**
 * Emails
 *
 */
class ComplaintNotification extends Notification {

    /**
     * @var \Nasajon\AppBundle\NsjMail\Entity\Notification\Complaint
     * @JMS\Type("Nasajon\AppBundle\NsjMail\Entity\Notification\Complaint")
     * @JMS\SerializedName("complaint")
     */
    private $complaint;

    public function __construct() {
        $this->complaint = new Complaint();
    }

    /**
     *
     * @return \Nasajon\AppBundle\NsjMail\Entity\Notification\Complaint
     */
    public function getComplaint() {
        return $this->complaint;
    }

    public function setComplaint($complaint) {
        $this->complaint = $complaint;
        return $this;
    }

    public function getType() {
        return 'Complaint';
    }

}
