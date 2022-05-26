<?php
namespace Survos\BarcodeBundle;

use Survos\BarcodeBundle\Twig\BarcodeTwigExtension;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class BarcodeBundle extends AbstractBundle
{

    // $config is the bundle Configuration that you usually process in ExtensionInterface::load() but already merged and processed
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
//        $loader = new XmlFileLoader($builder, new \Symfony\Component\Config\FileLocator(__DIR__.'/Resources/config/'));
//        $loader->load('services.xml');
//        $definition = $builder->getDefinition('survos.Barcode');

//        $serviceIdentifier = 'picqer.barcode';
//        $definition = $builder->autowire($serviceIdentifier, Barcode::class);
//        $container->services()->alias(Barcode::class, $serviceIdentifier);

        $definition = $builder->autowire('survos.barcode_twig', BarcodeTwigExtension::class)
            ->addTag('twig.extension');

        $definition->setArgument('$widthFactor', $config['widthFactor']);
        $definition->setArgument('$height', $config['height']);
        $definition->setArgument('$foregroundColor', $config['foregroundColor']);


//        dd($config, $definition->getProperties(), $definition->getArguments());


//
//        <service id="Survos\BaseBundle\Twig\Extensions" public="true" autowire="true">
//            <tag name="twig.extension" />
//        </service>

    }

    public function configure(DefinitionConfigurator $definition): void
    {
        // if the configuration is short, consider adding it in this class
        $definition->rootNode()
            ->children()
            ->scalarNode('widthFactor')->defaultValue(2)->end()
            ->scalarNode('height')->defaultValue(30)->end()
            ->scalarNode('foregroundColor')->defaultValue('green')->end()
            ->end();

        ;
    }
}
