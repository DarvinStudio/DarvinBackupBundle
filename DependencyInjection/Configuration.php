<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('darvin_backup');
        
        $rootNode
            ->children()
                ->arrayNode('files')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('path')->isRequired()->cannotBeEmpty()->end()
                            ->arrayNode('excluded')->prototype('scalar')->end()->end()
                            ->integerNode('incremental_copies_count')->defaultValue(3)->end()
                        ->end()
                    ->end()
                ->end()
                ->booleanNode('backup_database')->defaultTrue()->end()
            ->end()
        ;
        
        return $treeBuilder;
    }
}