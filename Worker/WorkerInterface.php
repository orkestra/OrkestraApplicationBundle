<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Worker;

/**
 * Defines the contract any worker must follow
 *
 * A worker is a "specialized" piece of code designed for accomplishing a task
 */
interface WorkerInterface
{
    /**
     * Gets the user-friendly name of the worker
     *
     * @return string
     */
    function getName();

    /**
     * Gets the internally used name of the worker
     *
     * @return string
     */
    function getInternalName();

    /**
     * Execute the work
     *
     * @return void
     */
    function execute();
}
