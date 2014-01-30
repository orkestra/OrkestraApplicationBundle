<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * An entity that relates a hash with another entity
 *
 * @ORM\Entity
 * @ORM\Table(name="orkestra_hashed_entities")
 */
class HashedEntity extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="class_name", type="string")
     */
    protected $className;

    /**
     * @var int
     *
     * @ORM\Column(name="reference_id", type="integer")
     */
    protected $referenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", unique=true)
     */
    protected $hash;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpires", type="date", nullable = true)
     */
    protected $dateExpires;

    /**
     * @var object
     */
    protected $referencedObject;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->className.' '.$this->referenceId;
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = (string) $className;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param $hash
     */
    public function setHash($hash)
    {
        $this->hash = (string) $hash;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param int $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = (int) $referenceId;
    }

    /**
     * @return int
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param object
     */
    public function setReferencedObject($referenceObject)
    {
        $this->referencedObject = $referenceObject;
    }

    /**
     * @return object
     */
    public function getReferencedObject()
    {
        return $this->referencedObject;
    }

    /**
     * @param \DateTime $dateExpires
     */
    public function setDateExpires(\DateTime $dateExpires = null)
    {
        $this->dateExpires = $dateExpires;
    }

    /**
     * @return \DateTime
     */
    public function getDateExpires()
    {
        return $this->dateExpires;
    }
}
