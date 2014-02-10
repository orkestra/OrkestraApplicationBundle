<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Entity\Contact;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface;
use Orkestra\Bundle\ApplicationBundle\Model\Contact\RegionInterface;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * A region within a country
 *
 * @ORM\Table(name="orkestra_countries_regions")
 * @ORM\Entity
 */
class Region extends AbstractEntity implements RegionInterface
{
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    protected $name;

    /**
     * @var string $code The ISO 3166-2 code
     *
     * @ORM\Column(name="code", type="string", length=10)
     */
    protected $code;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface", inversedBy="regions", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    protected $country;

    /**
     * Construct a new region
     *
     * @param string $name The name of the region
     * @param string $code The 2-letter ISO abbreviation
     */
    public function __construct($name = '', $code = '')
    {
        if (!empty($name)) { $this->name = $name; }
        if (!empty($code)) { $this->code = $code; }
    }

    /**
     * @return string The name of the region
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
     * Set country
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface $country
     */
    public function setCountry(CountryInterface $country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return \Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }
}
