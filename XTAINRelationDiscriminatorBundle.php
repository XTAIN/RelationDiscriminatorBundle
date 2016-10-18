<?php

namespace XTAIN\Bundle\RelationDiscriminatorBundle;

use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use XTAIN\Bundle\RelationDiscriminatorBundle\DependencyInjection\CompilerPass\JMSSerializerDiscriminatorPass;
use XTAIN\Bundle\RelationDiscriminatorBundle\DependencyInjection\CompilerPass\MapRegistryPass;

class XTAINRelationDiscriminatorBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new MapRegistryPass());
        $container->addCompilerPass(new JMSSerializerDiscriminatorPass(), PassConfig::TYPE_BEFORE_REMOVING);
    }
}
