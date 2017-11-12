<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\Storage\Type;


use Darvin\BackupBundle\Storage\StorageInterface;

interface StorageTypeInterface
{
    /**
     * @param array $options
     *
     * @return StorageInterface
     */
    public function getStorageObject(array $options);


    /**
     * @return string
     */
    public function getName();
}