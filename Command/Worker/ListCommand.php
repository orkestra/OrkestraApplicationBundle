<?php

namespace Orkestra\Bundle\ApplicationBundle\Command\Worker;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Lists all registered workers
 */
class ListCommand extends ContainerAwareCommand
{
    /**
     * Configures the current command
     */
    protected function configure()
    {
        $this->setName('orkestra:worker:list')
            ->setDescription('Lists all configured workers');
    }

    /**
     * Executes the current command
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $factory \Orkestra\Bundle\ApplicationBundle\Worker\WorkerFactoryInterface */
        $factory = $this->getContainer()->get('orkestra.worker_factory');
        $workers = $factory->getWorkers();

        $output->writeln('');

        if (count($workers) > 0) {
            $output->writeln(sprintf('<info>%-40s</info><comment>%s</comment>', 'Name', 'Internal Name'));

            foreach ($workers as $worker) {
                $output->writeln(sprintf('%-40s%s', $worker->getName(), $worker->getInternalName()));
            }
        } else {
            $output->writeln('<comment>No workers configured.</comment>');
        }
        $output->writeln('');
    }
}
