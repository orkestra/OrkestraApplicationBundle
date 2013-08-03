<?php

namespace Orkestra\Bundle\ApplicationBundle\Model\Contact;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Model\PersistentModelInterface;

/**
 * Defines the contract any region must follow
 */
interface RegionInterface extends PersistentModelInterface
{
    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code);

    /**
     * Get code
     *
     * @return string
     */
    public function getCode();

    /**
     * Set country
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface
     */
    public function setCountry(CountryInterface $country);

    /**
     * Get country
     *
     * @return \Orkestra\Bundle\ApplicationBundle\Model\Contact\CountryInterface
     */
    public function getCountry();
}
