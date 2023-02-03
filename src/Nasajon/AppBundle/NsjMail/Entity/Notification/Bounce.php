<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/** *
 * @ORM\Table(name="email.bounces")
 * @ORM\Entity(repositoryClass="Nasajon\AppBundle\NsjMail\Repository\BounceRepository")
 */
class Bounce {

    /**
     *
     * @ORM\Id
     * @ORM\Column(name="bounce", type="string", nullable=false)
     */
    private $bounce;

    /**
     * @ORM\Column(name="tipobounce", type="string", nullable=false)
     * @JMS\Type("string")
     * @JMS\SerializedName("bounceType")
     */
    private $bounceType;

    /**
     * @ORM\Column(name="subtipobounce", type="string", nullable=false)
     * @JMS\Type("string")
     * @JMS\SerializedName("bounceSubType")
     */
    private $bounceSubType;

    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("bouncedRecipients")
     */
    private $bouncedRecipients;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("timestamp")
     */
    private $timestamp;

    /**
     * @ORM\Column(name="feedbackid", type="string")
     * @JMS\Type("string")
     * @JMS\SerializedName("feedbackId")
     */
    private $feedbackId;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("remoteMtaIp")
     */
    private $remoteMtaIp;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("reportingMTA")
     */
    private $reportingMta;

    public function __construct($bounce = null) {
        $this->bouncedRecipients[] = new BouncedRecipient();

        if (!$bounce) return;

        $this->setBounce($bounce->bounce);
        $this->setBounceType($bounce->bounceType);
        $this->setBounceSubType($bounce->bounceSubType);
        $this->setBouncedRecipients($bounce->bouncedRecipients);
        $this->setFeedbackId($bounce->feedbackId);
        $this->setRemoteMtaIp($bounce->remoteMtaIp);
        $this->setTimestamp($bounce->timestamp);
        $this->setReportingMta($bounce->reportingMta);
    }

    public function getEmails() {
        return array_map(function ($recipient) {
            return $recipient['emailAddress'];
        }, $this->bouncedRecipients);
    }

    public function getBounce() {
        return $this->bounce;
    }

    public function setBounce($bounce) {
        $this->bounce = $bounce;
        return $this;
    }

    public function getBounceType() {
        return $this->bounceType;
    }

    public function setBounceType($bounceType) {
        $this->bounceType = $bounceType;
        return $this;
    }

    public function getBounceSubType() {
        return $this->bounceSubType;
    }

    public function setBounceSubType($bounceSubType) {
        $this->bounceSubType = $bounceSubType;
        return $this;
    }

    public function getBouncedRecipients() {
        return $this->bouncedRecipients;
    }

    public function setBouncedRecipients($bouncedRecipients) {
        $this->bouncedRecipients = $bouncedRecipients;
        return $this;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getFeedbackId() {
        return $this->feedbackId;
    }

    public function setFeedbackId($feedbackId) {
        $this->feedbackId = $feedbackId;
        return $this;
    }

    public function getRemoteMtaIp() {
        return $this->remoteMtaIp;
    }

    public function setRemoteMtaIp($remotemtaIp) {
        $this->remoteMtaIp = $remotemtaIp;
        return $this;
    }

    public function getReportingMta() {
        return $this->reportingMta;
    }

    public function setReportingMta($reportingMta) {
        $this->reportingMta = $reportingMta;
        return $this;
    }

}