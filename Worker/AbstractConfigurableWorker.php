<?php

namespace Orkestra\Bundle\ApplicationBundle\Worker;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Base class for any configurable worker
 */
abstract class AbstractConfigurableWorker implements ConfigurableWorkerInterface
{
    /**
     * @var \Symfony\Component\OptionsResolver\OptionsResolverInterface
     */
    private $resolver;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resolver = new OptionsResolver();
        $this->configureResolver($this->resolver);
    }

    /**
     * Configures the given OptionsResolver with the available options
     * for the worker.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired($this->getOptions());
    }

    /**
     * Executes the worker given the options
     *
     * @param array $options
     */
    public function execute(array $options = array())
    {
        $options = $this->resolver->resolve($options);

        $this->doExecute($options);
    }

    /**
     * Execute logic implemented by the worker
     *
     * @param array $options
     *
     * @return mixed
     */
    abstract protected function doExecute(array $options = array());
}
