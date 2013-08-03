<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * EmailTemplate Entity
 *
 * An email template
 *
 * @ORM\Table(name="orkestra_email_templates")
 * @ORM\Entity()
 */
class EmailTemplate extends AbstractEntity
{
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string")
     */
    protected $description = '';

    /**
     * @var string $sender
     *
     * @ORM\Column(name="sender", type="string")
     */
    protected $sender;

    /**
     * @var string $recipient
     *
     * @ORM\Column(name="recipient", type="string")
     */
    protected $recipient;

    /**
     * @var string $cc
     *
     * @ORM\Column(name="cc", type="string")
     */
    protected $cc = '';

    /**
     * @var array $headers
     *
     * @ORM\Column(name="headers", type="array")
     */
    protected $headers = array();

    /**
     * @var string $subject
     *
     * @ORM\Column(name="subject", type="string")
     */
    protected $subject;

    /**
     * @var string $body
     *
     * @ORM\Column(name="body", type="text")
     */
    protected $body;

    /**
     * @var string $mimeType
     *
     * @ORM\Column(name="mime_type", type="string")
     */
    protected $mimeType = 'text/html';

    /**
     * @var string $altBody
     *
     * @ORM\Column(name="alt_body", type="text")
     */
    protected $altBody = '';

    /**
     * @var string $altMimeType
     *
     * @ORM\Column(name="alt_mime_type", type="string")
     */
    protected $altMimeType = 'text/plain';

    /**
     * To String
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Description
     *
     * @param string $name
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Sender
     *
     * @param string $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * Get Sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set Recipient
     *
     * @param string $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * Get Recipient
     *
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Has Cc
     *
     * @return boolean
     */
    public function hasCc()
    {
        return empty($this->cc) ? false : true;
    }

    /**
     * Set Cc
     *
     * @param string $cc
     */
    public function setCc($cc)
    {
        $this->cc = (string) $cc;
    }

    /**
     * Get Cc
     *
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set Headers
     *
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get Headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set Subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get Subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set Body
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get Body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set Mime Type
     *
     * @param string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * Get Mime Type
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Has Alt Body
     *
     * @return boolean
     */
    public function hasAltBody()
    {
        return empty($this->altBody) ? false : true;
    }

    /**
     * Set Alt Body
     *
     * @param string $body
     */
    public function setAltBody($body)
    {
        $this->altBody = (string) $body;
    }

    /**
     * Get Alt Body
     *
     * @return string
     */
    public function getAltBody()
    {
        return $this->altBody;
    }

    /**
     * Set Alt Mime Type
     *
     * @param string $mimeType
     */
    public function setAltMimeType($mimeType)
    {
        $this->altMimeType = $mimeType;
    }

    /**
     * Get Alt Mime Type
     *
     * @return string
     */
    public function getAltMimeType()
    {
        return $this->altMimeType;
    }
}
