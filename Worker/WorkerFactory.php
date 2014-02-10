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
 * Responsible for registering and retrieving workers
 */
class WorkerFactory implements WorkerFactoryInterface
{
    /**
     * @var array|WorkerInterface[]
     */
    protected $workers = array();

    /**
     * Registers a worker with the factory
     *
     * @param WorkerInterface $worker
     */
    public function registerWorker(WorkerInterface $worker)
    {
        $this->workers[$worker->getInternalName()] = $worker;
    }

    /**
     * Gets all registered workers
     *
     * @return array
     */
    public function getWorkers()
    {
        return array_values($this->workers);
    }

    /**
     * Gets a single worker
     *
     * @param string $name
     *
     * @throws \RuntimeException
     * @return \Orkestra\Bundle\ApplicationBundle\Worker\WorkerInterface
     */
    public function getWorker($name)
    {
        if (!isset($this->workers[$name])) {
            throw new \RuntimeException(sprintf('Unknown worker "%s".', $name));
        }

        return $this->workers[$name];
    }
}
