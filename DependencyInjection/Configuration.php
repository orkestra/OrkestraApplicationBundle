<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('orkestra_application');
        $rootNode->children()
            ->variableNode('system_email_address')->defaultValue('system@terramarlabs.com')->end()
            ->scalarNode('ca_bundle_path')->defaultValue('%kernel.root_dir%/Resources/curl/ca-bundle.crt')->end()
            ->booleanNode('enable_latlong_lookup')->defaultFalse()->end();

        return $treeBuilder;
    }
}
