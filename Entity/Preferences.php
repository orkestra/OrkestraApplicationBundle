<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Orkestra\Bundle\ApplicationBundle\Model\PreferencesInterface;
use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * Preferences Entity
 *
 * Defines a user's preferences
 *
 * @ORM\Table(name="orkestra_user_preferences")
 * @ORM\Entity()
 */
class Preferences extends AbstractEntity implements PreferencesInterface
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
     * @ORM\OneToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\UserInterface", inversedBy="preferences")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->timezone = date_default_timezone_get();
        $this->dateFormat = 'Y-m-d';
        $this->timeFormat = 'H:i:s';
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
    }

    /**
     * @return string
     */
    public function getTimeFormat()
    {
        return $this->timeFormat;
    }

    /**
     * @param string $timeFormat
     */
    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = (string) $timeFormat;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
        if ($user->getPreferences() !== $this) {
            $user->setPreferences($this);
        }
    }
}
