<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

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
