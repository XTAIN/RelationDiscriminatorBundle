<?php

namespace XTAIN\Bundle\RelationDiscriminatorBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class JMSSerializerDiscriminatorPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $alias = $container->getAlias('jms_serializer.metadata_driver');

        $decoratorDefinition = $container->getDefinition('xtain_relation_discriminator.jms_serializer.discriminator_metadata_driver');
        $decoratorDefinition->replaceArgument(0, new Reference((string) $alias));

        $container->setAlias('jms_serializer.metadata_driver', 'xtain_relation_discriminator.jms_serializer.discriminator_metadata_driver');
    }
}