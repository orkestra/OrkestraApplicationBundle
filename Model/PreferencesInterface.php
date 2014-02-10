<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Model;

/**
 * Defines the contract any user preferences must follow.
 */
interface PreferencesInterface extends PersistentModelInterface
{
    /**
     * Gets the user's timezone
     *
     * @return string
     */
    public function getTimezone();

    /**
     * Sets the user's timezone
     *
     * @param string $timezone
     */
    public function setTimezone($timezone);

    /**
     * Gets the user's date format
     *
     * @return string
     */
    public function getDateFormat();

    /**
     * Sets the user's date format
     *
     * @param string $dateFormat
     */
    public function setDateFormat($dateFormat);

    /**
     * Gets the user's time format
     *
     * @return string
     */
    public function getTimeFormat();

    /**
     * Sets the user's time format
     *
     * @param string $timeFormat
     */
    public function setTimeFormat($timeFormat);

    /**
     * Gets the user
     *
     * @return string
     */
    public function getUser();

    /**
     * Sets the user
     *
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user);
}
