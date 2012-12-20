<?php

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
                ->booleanNode('enable_latlong_lookup')
                    ->defaultFalse()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
