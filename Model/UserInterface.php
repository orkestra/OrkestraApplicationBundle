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
 * Defines the contract any user must implement
 */
interface UserInterface extends PersistentModelInterface
{
    /**
     * Sets the user's email address
     *
     * @param $email
     */
    public function setEmail($email);

    /**
     * Gets the user's email address
     *
     * @return mixed
     */
    public function getEmail();

    /**
     * Gets the user's username
     *
     * @return mixed
     */
    public function getUsername();

    /**
     * Sets the user's username
     *
     * @param $username
     */
    public function setUsername($username);

    /**
     * Sets the user's first name
     *
     * @param $firstName
     */
    public function setFirstName($firstName);

    /**
     * Gets the user's first name
     *
     * @return mixed
     */
    public function getFirstName();

    /**
     * Sets the user's last name
     *
     * @param $lastName
     */
    public function setLastName($lastName);

    /**
     * Gets the user's last name
     *
     * @return mixed
     */
    public function getLastName();

    /**
     * Gets the user's preferences
     *
     * @return mixed
     */
    public function getPreferences();

    /**
     * Sets the user's preferences
     *
     * @param PreferencesInterface $preferences
     */
    public function setPreferences(PreferencesInterface $preferences);

    /**
     * Adds a group to this user
     *
     * @param GroupInterface $group
     */
    public function addGroup(GroupInterface $group);

    /**
     * Sets this user's groups
     *
     * @param array|\Doctrine\Common\Collections\Collection $groups
     */
    public function setGroups($groups);

    /**
     * Gets this user's groups
     *
     * @return \Doctrine\Common\Collections\Collection|GroupInterface[]
     */
    public function getGroups();

    /**
     * Removes a group from this user
     *
     * @param GroupInterface $group
     */
    public function removeGroup(GroupInterface $group);
}
