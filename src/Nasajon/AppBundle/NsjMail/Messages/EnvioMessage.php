<?php

namespace Nasajon\AppBundle\NsjMail\Messages;

use JMS\Serializer\Annotation\Type;
use Nasajon\AppBundle\NsjMail\Validator\Constraints as NasajonAssert;
use Symfony\Component\Validator\Constraints as Assert;
use Bernard\Util;


class EnvioMessage extends AbstractMessage
{

    const TIPO_REAL = 1;
    const TIPO_TESTE = 2;

    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank (message = "(From) E-mail é obrigatório.")
     */
    private $from;

    /**
     * @var array
     * @Type("array")
     * @Assert\All({
     *     @NasajonAssert\Email(message = "(To) E-mail inválido."),
     * })
     */
    private $to;

    /**
     * @var array
     * @Type("array")
     * @Assert\All({
     *     @NasajonAssert\Email(message = "(ReplyTo) E-mail inválido."),
     * })
     */
    private $replyto;

    /**
     * @var array
     * @Type("array")
     * @Assert\All({
     *     @NasajonAssert\Email(message = "(Cc) E-mail inválido."),
     * })
     */
    private $cc;

    /**
     * @var array
     * @Type("array")
     * @Assert\All({
     *     @NasajonAssert\Email(message = "(Bcc) E-mail inválido."),
     * })
     */
    private $bcc;

    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank(message = "O código do Template é obrigatório.")
     */
    private $codigo_template;

    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank(message = "(Subject) O campo Assunto é obrigatório.")
     */
    private $subject;

    /**
     * @var string
     * @Type("string")
     */
    private $customheader;

    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank(message = "(Body) O campo de Conteúdo do E-mail é obrigatório.")
     */
    private $body;

    /**
     * @var integer
     * @Type("integer")
     */
    private $tenant;

    /**
     * @var integer
     * @Type("integer")
     */
    private $sistema;

    /**
     * @var string
     * @Type("string")
     */
    private $campanha;

    /**
     * @var \DateTime
     *
     * @Type("DateTime")
     */
    private $datacadastro;

    /**
     * @var integer
     * @Type("integer")
     */
    private $tipo;

    /**
     * @var string
     * @Type("string")
     */
    private $contato;

    /**
     * @var array
     * @Type("array")
     */
    private $attachments;

    /**
     * @var array
     * @Type("array")
     */
    private $attachments_names;

    /**
     * @var array
     * @Type("array")
     */
    private $attachments_content_types;

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getReplyto()
    {
        return $this->replyto;
    }

    public function getCc()
    {
        return $this->cc;
    }

    public function getBcc()
    {
        return $this->bcc;
    }

    public function getCodigoTemplate()
    {
        return $this->codigo_template;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getCustomheader()
    {
        return $this->customheader;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getTenant()
    {
        return $this->tenant;
    }

    public function getSistema()
    {
        return $this->sistema;
    }

    public function getCampanha()
    {
        return $this->campanha;
    }

    public function getDatacadastro(): \DateTime
    {
        return $this->datacadastro;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function getAttachmentsNames()
    {
        return $this->attachments_names;
    }

    public function getAttachmentsContentTypes()
    {
        return $this->attachments_content_types;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    public function setReplyto($replyto)
    {
        $this->replyto = $replyto;
        return $this;
    }

    public function setCc($cc)
    {
        $this->cc = $cc;
        return $this;
    }

    public function setCodigoTemplate($codigo_template)
    {
        $this->codigo_template = $codigo_template;
        return $this;
    }

    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
        return $this;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function setCustomheader($customheader)
    {
        $this->customheader = $customheader;
        return $this;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function setTenant($tenant)
    {
        $this->tenant = $tenant;
        return $this;
    }

    public function setSistema($sistema)
    {
        $this->sistema = $sistema;
        return $this;
    }

    public function setCampanha($campanha)
    {
        $this->campanha = $campanha;
        return $this;
    }

    public function setDatacadastro(\DateTime $datacadastro)
    {
        $this->datacadastro = $datacadastro;
        return $this;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
        return $this;
    }

    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    public function setAttachmentsNames($attachments_names)
    {
        $this->attachments_names = $attachments_names;
        return $this;
    }

    public function setAttachmentsContentTypes($attachments_content_types)
    {
        $this->attachments_content_types = $attachments_content_types;
        return $this;
    }

}