<?php

namespace Orkestra\Bundle\ApplicationBundle\Worker;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Defines the contract any configurable worker must follow
 */
interface ConfigurableWorkerInterface extends WorkerInterface
{
    /**
     * Execute the work
     *
     * @param array $options
     *
     * @return void
     */
    public function execute(array $options = array());

    /**
     * Gets an array of required options
     *
     * @todo Allow more than just 'required' options
     *
     * @return array
     */
    public function getOptions();
}
