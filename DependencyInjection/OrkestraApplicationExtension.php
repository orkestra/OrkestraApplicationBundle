<?php

namespace Orkestra\Bundle\ApplicationBundle\DependencyInjection;

use Orkestra\Bundle\ApplicationBundle\OrkestraApplicationBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class OrkestraApplicationExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $this->configureCore($container, $config);
        $this->configureLatLong($container, $config);
    }

    private function configureCore(ContainerBuilder $container, array $config)
    {
        $container->setParameter('orkestra.system_email_address', $config['system_email_address']);
        $container->setParameter('orkestra.ca_bundle.path', $config['ca_bundle_path']);
    }
    
    private function configureLatLong(ContainerBuilder $container, array $config)
    {
        if (true !== $config['enable_latlong_lookup']) {
            $container->removeDefinition('orkestra.worker.latitude_longitude');
            $container->removeDefinition('orkestra.subscriber.latitude_longitude');
        }
    }

    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        if (!$container->hasParameter('app.version')) {
            $container->setParameter('app.version', OrkestraApplicationBundle::VERSION);
        }
    }
}
