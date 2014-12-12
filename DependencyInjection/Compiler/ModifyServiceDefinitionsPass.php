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

use Orkestra\Bundle\ApplicationBundle\OrkestraApplicationBundle;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Overrides necessary service definitions.
 */
class ModifyServiceDefinitionsPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $this->overrideAuthenticationServices($container);
    }

    /**
     * Overrides authentication related services
     *
     * @param ContainerBuilder $container
     */
    private function overrideAuthenticationServices(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('security.authentication.failure_handler');
        $definition->setClass('Orkestra\Bundle\ApplicationBundle\Security\Authentication\AuthenticationFailureHandler');
    }
}
