<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Model\Contact;

use Orkestra\Bundle\ApplicationBundle\Model\PersistentModelInterface;

/**
 * Defines the contract any physical address must follow
 */
interface AddressInterface extends PersistentModelInterface
{
    /**
     * @param string $altPhone
     */
    public function setAltPhone($altPhone);

    /**
     * @return string
     */
    public function getAltPhone();

    /**
     * @param string $city
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $phone
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Model\Contact\RegionInterface $region
     */
    public function setRegion(RegionInterface $region);

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Model\Contact\RegionInterface
     */
    public function getRegion();

    /**
     * @param string $street
     */
    public function setStreet($street);

    /**
     * @return string
     */
    public function getStreet();

    /**
     * @param string $suite
     */
    public function setSuite($suite);

    /**
     * @return string
     */
    public function getSuite();

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode);

    /**
     * @return string
     */
    public function getPostalCode();

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude);

    /**
     * @return float
     */
    public function getLatitude();

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude);

    /**
     * @return float
     */
    public function getLongitude();

    /**
     * @param boolean $valid
     */
    public function setValid($valid);

    /**
     * @return boolean
     */
    public function getValid();

    /**
     * @return boolean
     */
    public function isValid();

    /**
     * @param boolean $validated
     */
    public function setValidated($validated);

    /**
     * @return boolean
     */
    public function getValidated();

    /**
     * @return boolean
     */
    public function isValidated();
}
