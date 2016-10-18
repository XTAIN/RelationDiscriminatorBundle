<?php

namespace XTAIN\Bundle\RelationDiscriminatorBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MapRegistryPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $mapRegistry = $container->getDefinition('xtain_relation_discriminator.map_registry');

        $maps = array();
        foreach ($container->findTaggedServiceIds('xtain_relation_discriminator.relation_map') as $id => $tags) {
            $maps[] = new Reference($id);
        }

        $mapRegistry->replaceArgument(0, $maps);
    }
}