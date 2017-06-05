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


use Darvin\BackupBundle\DependencyInjection\Compiler\BackupConfigurationPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;


class DarvinBackupExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__) . '/Resources/config'));
        $loader->load('services.yml');

        // build configurator
        $configuratorDefinition = $container
            ->getDefinition('darvin_backup.configurator')
            ->addArgument($config['backup_title'])
            ->addArgument($config['backup_dir'])
            ->addArgument($config['backup_database']);


        $filesConfigDefinitions = [];
        $parentFilesDefinition = 'darvin_backup.files_configurator';
        foreach ($config['files'] as $key => $fileConfig) {
            $id = $parentFilesDefinition . '.' . $key;
            if ($container->hasDefinition($id)) {
                throw new \RuntimeException(sprintf('Container already has %s service', $id));
            }
            $filesConfigDefinitions[$id] = (new DefinitionDecorator($parentFilesDefinition))
                ->addArgument($fileConfig['path'])
                ->addArgument($fileConfig['excluded'])
                ->addArgument($fileConfig['incremental_copies_count']);
        }

        $container->addDefinitions($filesConfigDefinitions);

        foreach (array_keys($filesConfigDefinitions) as $fileConfigId) {
            $configuratorDefinition->addMethodCall('addFilesConfiguration', [new Reference($fileConfigId)]);
        }
    }
}