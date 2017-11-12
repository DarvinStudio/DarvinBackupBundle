<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\Storage;

/**
 * Class AbstractStorage
 * @package Darvin\BackupBundle\Storage
 */
abstract class AbstractStorage implements StorageInterface
{
    /**
     * @var null|int
     */
    protected $maxUsedSize = null;

    /**
     * @var null|int
     */
    protected $maxCopiesCount = null;

    /**
     * @return int|null maximum allowed size in bytes,
     *                  null - infinity
     */
    public function getMaxUsedSize()
    {
        return $this->maxUsedSize;
    }

    /**
     * @return int|null maximum allowed count of copies,
     *                  null - infinity
     */
    public function getMaxCopiesCount()
    {
        return $this->maxCopiesCount;
    }

    /**
     * @param int|null $maxUsedSize
     */
    public function setMaxUsedSize($maxUsedSize)
    {
        $this->maxUsedSize = $maxUsedSize;
    }

    /**
     * @param int|null $maxCopiesCount
     */
    public function setMaxCopiesCount($maxCopiesCount)
    {
        $this->maxCopiesCount = $maxCopiesCount;
    }
}