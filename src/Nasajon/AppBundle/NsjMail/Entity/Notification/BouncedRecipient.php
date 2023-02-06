<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation as JMS;

class BouncedRecipient extends AbstractRecipient{

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("action")
     */
    private $action;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    private $status;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("diagnosticCode")
     */
    private $diagnosticCode;

    public function __construct() {
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function getDiagnosticCode() {
        return $this->diagnosticCode;
    }

    public function setDiagnosticCode($diagnosticCode) {
        $this->diagnosticCode = $diagnosticCode;
        return $this;
    }

}