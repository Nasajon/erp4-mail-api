<?php

namespace Nasajon\AppBundle\NsjMail\Entity\Notification;

use JMS\Serializer\Annotation as JMS;

class Mail
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("timestamp")
     */
    private $timestamp;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("messageId")
     */
    private $messageId;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("source")
     */
    private $source;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("sourceArn")
     */
    private $sourceArn;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("sourceIp")
     */
    private $sourceIp;
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("sendingAccountId")
     */
    private $sendingAccountId;
    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("destination")
     */
    private $destination;
    /**
     * @JMS\Type("boolean")
     * @JMS\SerializedName("headersTruncated")
     */
    private $headersTruncated;
    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("headers")
     */
    private $headers;
    /**
     * @JMS\Type("array")
     * @JMS\SerializedName("commonHeaders")
     */
    private $commonHeaders;


    public function __construct($mail = null)
    {
        if (!$mail) return;

        $this->setTimestamp($mail->timestamp);
        $this->setCommonHeaders($mail->commonHeaders);
        $this->setDestination($mail->destination);
        $this->setHeaders($mail->headers);
        $this->setHeadersTruncated($mail->headersTruncated);
        $this->setMessageId($mail->messageId);
        $this->setSendingAccountId($mail->sendingAccountId);
        $this->setSource($mail->source);
        $this->setSourceArn($mail->sourceArn);
        $this->setSourceIp($mail->sourceIp);
        $this->setTimestamp($mail->timestamp);
    }

    public function getTimestamp()
    {
    	return $this->timestamp;
    }
    public function setTimestamp($timestamp)
    {
    	$this->timestamp = $timestamp;
    	return $this;
    }

    public function getMessageId()
    {
    	return $this->messageId;
    }
    public function setMessageId($messageId)
    {
    	$this->messageId = $messageId;
    	return $this;
    }

    public function getSource()
    {
    	return $this->source;
    }
    public function setSource($source)
    {
    	$this->source = $source;
    	return $this;
    }

    public function getSourceArn()
    {
    	return $this->sourceArn;
    }
    public function setSourceArn($sourceArn)
    {
    	$this->sourceArn = $sourceArn;
    	return $this;
    }

    public function getSourceIp()
    {
    	return $this->sourceIp;
    }
    public function setSourceIp($sourceIp)
    {
    	$this->sourceIp = $sourceIp;
    	return $this;
    }

    public function getSendingAccountId()
    {
    	return $this->sendingAccountId;
    }
    public function setSendingAccountId($sendingAccountId)
    {
    	$this->sendingAccountId = $sendingAccountId;
    	return $this;
    }

    public function getDestination()
    {
    	return $this->destination;
    }
    public function setDestination($destination)
    {
    	$this->destination = $destination;
    	return $this;
    }

    public function getHeadersTruncated()
    {
    	return $this->headersTruncated;
    }
    public function setHeadersTruncated($headersTruncated)
    {
    	$this->headersTruncated = $headersTruncated;
    	return $this;
    }

    public function getHeaders()
    {
    	return $this->headers;
    }
    public function setHeaders($headers)
    {
    	$this->headers = $headers;
    	return $this;
    }

    public function getCommonHeaders()
    {
    	return $this->commonHeaders;
    }
    public function setCommonHeaders($commonHeaders)
    {
    	$this->commonHeaders = $commonHeaders;
    	return $this;
    }
}
