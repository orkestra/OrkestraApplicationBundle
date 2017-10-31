<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Command\Worker;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Executes a worker
 */
class ExecuteCommand extends ContainerAwareCommand
{
    /**
     * Configures the current command
     */
    protected function configure()
    {
        $this->setName('orkestra:worker:execute')
            ->addArgument('name', InputArgument::REQUIRED, 'The internal name of the worker to execute.')
            ->setDescription('Executes the specified worker.');
    }

    /**
     * Executes the current command
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        /** @var $factory \Orkestra\Bundle\ApplicationBundle\Worker\WorkerFactoryInterface */
        $factory = $this->getContainer()->get('orkestra.worker_factory');
        $worker = $factory->getWorker($name);

        $worker->execute();

        $output->writeln(array(
            '',
            'The worker has completed successfully.',
            ''
        ));
    }
}
