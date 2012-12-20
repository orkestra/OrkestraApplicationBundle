<?php

namespace Orkestra\Bundle\ApplicationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Registers all workers with the Worker factory
 */
class RegisterWorkersPass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('orkestra.worker_factory')) {
            return;
        }

        $definition = $container->getDefinition('orkestra.worker_factory');

        foreach ($container->findTaggedServiceIds('orkestra.worker') as $service => $tags) {
            $definition->addMethodCall('registerWorker', array(new Reference($service)));
        }
    }
}
