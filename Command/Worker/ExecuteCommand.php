<?php

namespace Orkestra\Bundle\ApplicationBundle\Command\Worker;

use Orkestra\Bundle\ApplicationBundle\Worker\ConfigurableWorkerInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Executes a worker
 */
class ExecuteCommand extends ContainerAwareCommand
{
    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Worker\WorkerInterface
     */
    protected $worker;

    /**
     * Configures the command
     */
    protected function configure()
    {
        $this->ignoreValidationErrors();
        $this->setName('orkestra:worker:execute')
            ->addArgument('name', InputArgument::REQUIRED, 'The internal name of the worker to execute.')
            ->setDescription('Executes the specified worker.');
    }

    /**
     * Initializes the command
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @throws \RuntimeException
     */
    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        /** @var $factory \Orkestra\Bundle\ApplicationBundle\Worker\WorkerFactoryInterface */
        $factory = $this->getContainer()->get('orkestra.worker_factory');
        $this->worker = $factory->getWorker($name);

        if (!$this->worker) {
            throw new \RuntimeException(sprintf('Unable to locate worker "%s"', $name));
        } elseif ($this->worker instanceof ConfigurableWorkerInterface) {
            $options = $this->worker->getOptions();
            $definition = $this->getDefinition();
            foreach ($options as $option) {
                $definition->addOption(new InputOption($option));
            }

            $input->bind($definition);
        }
    }

    /**
     * Executes the command
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $options = $this->worker instanceof ConfigurableWorkerInterface ? $this->getOptions($input) : array();
        print_r($options);

        $this->worker->execute($options);

        $output->writeln(array(
            '',
            'The worker has completed successfully.',
            ''
        ));
    }

    /**
     * Filters the given input, removing built-in options
     *
     * @todo Address short-sightedness of this filter
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @return array
     */
    private function getOptions(InputInterface $input)
    {
        $options = $input->getOptions();

        $filter = array(
            'help',
            'quiet',
            'verbose',
            'version',
            'ansi',
            'no-ansi',
            'no-interaction',
            'shell',
            'process-isolation',
            'env',
            'no-debug'
        );

        foreach (array_keys($options) as $key) {
            if (in_array($key, $filter)) {
                unset($options[$key]);
            }
        };

        return $options;
    }
}
