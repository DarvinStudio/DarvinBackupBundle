<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\BackupConfiguration;


use Darvin\BackupBundle\BackupConfiguration\Exception\UnableToFindStorageConfiguration;
use Darvin\BackupBundle\Storage\StorageInterface;
use Darvin\BackupBundle\Storage\Type\StorageTypeInterface;

/**
 * Class StorageConfiguration
 * @package Darvin\BackupBundle\BackupConfiguration
 */
class StorageConfiguration
{
    /**
     * @var array|StorageTypeInterface[]
     */
    private $storageTypes = [];

    /**
     * @var array|array[]
     */
    private $storageConfigs = [];

    /**
     * @param StorageTypeInterface $type
     */
    public function addStorageType(StorageTypeInterface $type)
    {
        $this->storageTypes[$type->getName()] = $type;
    }

    /**
     * @param $typeName
     *
     * @return StorageTypeInterface
     * @throws UnableToFindStorageConfiguration
     */
    public function findStorageType($typeName)
    {
        if (!isset($this->storageTypes[$typeName])) {
            throw new UnableToFindStorageConfiguration($typeName);
        }

        return $this->storageTypes[$typeName];
    }

    /**
     * @param string $storageType
     * @param array  $options
     */
    public function addStorageConfig($storageType, array $options)
    {
        $this->storageConfigs[$storageType] = $options;
    }

    /**
     * @return array|StorageInterface[]
     */
    public function getAllStorage()
    {
        $result = [];
        foreach ($this->storageConfigs as $typeName => $options) {
            $type = $this->findStorageType($typeName);
            $result[] = $type->getStorageObject($options);
        }

        return $result;
    }
}