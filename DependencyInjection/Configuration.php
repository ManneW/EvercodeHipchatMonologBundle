<?php

namespace Evercode\HipchatBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('evercode_hipchat_monolog');

        $rootNode
            ->children()
                ->scalarNode('room')
                    ->info('HipChat room name for error reporting')
                    ->defaultValue('Errors')
                ->end()
                ->scalarNode('name')
                    ->info('HipChat reporters user name')
                    ->defaultValue('Error Reporter')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
