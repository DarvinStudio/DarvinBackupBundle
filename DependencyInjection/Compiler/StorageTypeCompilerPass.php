<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class StorageTypeCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('darvin_backup.storage_configuration')) {
            return null;
        }

        $definition = $container->getDefinition('darvin_backup.storage_configuration');

        foreach ($container->findTaggedServiceIds('darvin_backup.storage_type') as $id => $tags) {
            $definition->addMethodCall('addStorageType', [new Reference($id)]);
        }
    }
}