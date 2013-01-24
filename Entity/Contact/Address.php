<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity\Contact;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * A physical address
 *
 * @ORM\Entity
 * @ORM\Table(name="orkestra_addresses")
 */
class Address extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string")
     */
    protected $phone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="alt_phone", type="string")
     */
    protected $altPhone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string")
     */
    protected $street;

    /**
     * @var string
     *
     * @ORM\Column(name="suite", type="string")
     */
    protected $suite = '';

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string")
     */
    protected $postalCode;

    /**
     * @var float $latitude
     *
     * @ORM\Column(name="latitude", type="decimal", precision=9, scale=6, nullable=true)
     */
    protected $latitude = null;

    /**
     * @var float $longitude
     *
     * @ORM\Column(name="longitude", type="decimal", precision=9, scale=6, nullable=true)
     */
    protected $longitude = null;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    protected $region;

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s, %s, %s %s', trim($this->street . ' ' . $this->suite), $this->city, $this->region->getCode(), $this->postalCode);
    }

    /**
     * @param string $altPhone
     */
    public function setAltPhone($altPhone)
    {
        $this->altPhone = (string)$altPhone;
    }

    /**
     * @return string
     */
    public function getAltPhone()
    {
        return $this->altPhone;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = (string)$phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region $region
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;
    }

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $suite
     */
    public function setSuite($suite)
    {
        $this->suite = (string)$suite;
    }

    /**
     * @return string
     */
    public function getSuite()
    {
        return $this->suite;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
