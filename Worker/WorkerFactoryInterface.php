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
 * Defines the contract any worker factory must follow
 */
interface WorkerFactoryInterface
{
    /**
     * Registers a worker with the factory
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Worker\WorkerInterface $worker
     */
    function registerWorker(WorkerInterface $worker);

    /**
     * Gets a worker
     *
     * @param string $name
     *
     * @return \Orkestra\Bundle\ApplicationBundle\Worker\WorkerInterface
     */
    function getWorker($name);

    /**
     * Gets all registered workers
     *
     * @return array|WorkerInterface[]
     */
    function getWorkers();
}
