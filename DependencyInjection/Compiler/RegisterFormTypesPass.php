<?php

namespace Orkestra\Bundle\ApplicationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class RegisterFormTypesPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('orkestra.form_helper')) {
            return;
        }

        $definition = $container->getDefinition('orkestra.form_helper');

        foreach ($container->findTaggedServiceIds('orkestra.form_type') as $service => $tag) {
            if (empty($tag[0]['class'])) {
                throw new \InvalidArgumentException(sprintf('Service tag for form type "%s" must specify the "class" attribute.', $service));
            }

            $property = empty($tag[0]['property']) ? null : $tag[0]['property'];
            $value = empty($tag[0]['value']) ? null : $tag[0]['value'];

            $definition->addMethodCall('addType', array($tag[0]['class'], new Reference($service), $property, $value));
        }
    }
}
