<?php

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface,
    Symfony\Component\Security\Core\User\UserInterface,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM;

use Orkestra\Common\Entity\AbstractEntity;

/**
 * Preferences Entity
 *
 * Defines a user's preferences
 *
 * @ORM\Table(name="orkestra_user_preferences")
 * @ORM\Entity()
 */
class Preferences extends AbstractEntity
{
    /**
     * @ORM\Column(name="timezone", type="string", length=255)
     */
    private $timezone;

    /**
     * @ORM\Column(name="date_format", type="string", length=40)
     */
    private $dateFormat;

    /**
     * @ORM\Column(name="time_format", type="string", length=40)
     */
    private $timeFormat = '';

    /**
     * @ORM\OneToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\User", inversedBy="preferences")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
        $this->timezone = date_default_timezone_get();
        $this->dateFormat = 'Y-m-d';
        $this->timeFormat = 'H:i:s';
    }

    public function getTimezone()
    {
        return $this->timezone;
    }

    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
    }

    public function getTimeFormat()
    {
        return $this->timeFormat;
    }

    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = (string)$timeFormat;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
}
