<?php

namespace Orkestra\Bundle\ApplicationBundle\Model\Contact;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Model\PersistentModelInterface;

/**
 * Defines the contract a country must follow
 */
interface CountryInterface extends PersistentModelInterface
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
     * Set longCode
     *
     * @param string $longCode
     */
    public function setLongCode($longCode);

    /**
     * Get longCode
     *
     * @return string
     */
    public function getLongCode();

    /**
     * Add a region to this country
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Model\Contact\RegionInterface $region
     */
    public function addRegion(RegionInterface $region);

    /**
     * Get regions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegions();
}
