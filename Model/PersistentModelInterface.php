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
 * Defines the contract any persistent model should follow
 */
interface PersistentModelInterface
{
    /**
     * Get ID
     *
     * @return integer
     */
    public function getId();

    /**
     * Set Active
     *
     * @param boolean
     */
    public function setActive($active);

    /**
     * Is Active
     *
     * @return boolean
     */
    public function isActive();

    /**
     * Get Date Created
     *
     * @return \DateTime
     */
    public function getDateCreated();

    /**
     * Get Date Modified
     *
     * @return \DateTime
     */
    public function getDateModified();
}
