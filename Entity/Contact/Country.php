<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity\Contact;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Common\Entity\EntityBase;

/**
 * A country
 *
 * @ORM\Entity
 * @ORM\Table(name="orkestra_countries")
 */
class Country extends EntityBase
{
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    protected $name;

    /**
     * @var string $code The ISO 3166-1 2 letter code
     *
     * @ORM\Column(name="code", type="string", length=10)
     */
    protected $code;

    /**
     * @var string $longCode The ISO 3166-2 3 letter code
     *
     * @ORM\Column(name="long_code", type="string", length=10)
     */
    protected $longCode;

    /**
     * @var \Doctrine\Common\Collections\Collection Collection of region entities
     *
     * @ORM\OneToMany(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Contact\Country", mappedBy="country", cascade={"persist"})
     */
    protected $regions;

    /**
     * Constructor
     *
     * @param string $name The name of the country
     * @param string $code The 2-letter ISO abbreviation
     * @param string $longCode The 3-letter ISO abbreviation
     * @param string $phonePrefix The country's phone country code
     * @param string $phoneFormat A regular expression describing how a phone number should look to an end user
     */
    public function __construct($name = '', $code = '', $longCode = '', $phonePrefix = '', $phoneFormat = '')
    {
        if (!empty($name)) { $this->name = $name; }
        if (!empty($code)) { $this->code = $code; }
        if (!empty($longCode)) { $this->longCode = $longCode; }
        if (!empty($phonePrefix)) { $this->phonePrefix = $phonePrefix; }
        if (!empty($phoneFormat)) { $this->phoneFormat = $phoneFormat; }
    }

    /**
     * @return string The name of the country
     */
    public function __toString()
    {
        return sprintf('%s', $this->getName());
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set longCode
     *
     * @param string $longCode
     */
    public function setLongCode($longCode)
    {
        $this->longCode = $longCode;
    }

    /**
     * Get longCode
     *
     * @return string
     */
    public function getLongCode()
    {
        return $this->longCode;
    }

    /**
     * Add a region to this country
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region $region
     */
    public function addRegion(Region $region)
    {
        $region->setCountry($this);
        $this->regions->add($region);
    }

    /**
     * Get regions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegions()
    {
        return $this->regions;
    }
}
