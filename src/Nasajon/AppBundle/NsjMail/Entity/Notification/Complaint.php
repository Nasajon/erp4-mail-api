<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;

class Complaint {

    /**
     * @Type("array")
     * @SerializedName("complainedRecipients")
     */
    private $complainedRecipients;
    /**
     * @Type("string")
     * @SerializedName("timestamp")
     */
    private $timestamp;
    /**
     * @Type("string")
     * @SerializedName("feedbackId")
     */
    private $feedbackId;
    /**
     * @Type("string")
     * @SerializedName("userAgent")
     */
    private $userAgent;
    /**
     * @Type("string")
     * @SerializedName("complaintFeedbackType")
     */
    private $complaintFeedbackType;
    /**
     * @Type("string")
     * @SerializedName("arrivalDate")
     */
    private $arrivalDate;

    public function __construct($complaint = null) {
        $this->complainedRecipients[] = new ComplainedRecipient();

        if (!$complaint) return;

        $this->setArrivalDate($complaint->arrivalDate);
        $this->setComplainedRecipients($complaint->complainedRecipients);
        $this->setComplaintFeedbackType($complaint->complaintFeedbackType);
        $this->setFeedbackId($complaint->feedbackId);
        $this->setTimestamp($complaint->timestamp);
        $this->setUserAgent($complaint->userAgent);
    }


    public function getEmails() {
        return array_map(function ($recipient) {
            return $recipient['emailAddress'];
        },$this->complainedRecipients);
    }

    public function getComplainedRecipients() {
        return $this->complainedRecipients;
    }

    public function setComplainedRecipients($complainedRecipients) {
        $this->complainedRecipients = $complainedRecipients;
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

    public function setFeedbackId($feedbackid) {
        $this->feedbackId = $feedbackid;
        return $this;
    }

    public function getUserAgent() {
        return $this->userAgent;
    }

    public function setUserAgent($useragent) {
        $this->userAgent = $useragent;
        return $this;
    }

    public function getComplaintFeedbackType() {
        return $this->complaintFeedbackType;
    }

    public function setComplaintFeedbackType($complaintFeedbackType) {
        $this->complaintFeedbackType = $complaintFeedbackType;
        return $this;
    }

    public function getArrivalDate() {
        return $this->arrivalDate;
    }

    public function setArrivalDate($arrivalDate) {
        $this->arrivalDate = $arrivalDate;
        return $this;
    }

}
