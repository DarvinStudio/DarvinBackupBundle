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


/**
 * Class FilesBackupConfiguration
 * @package Darvin\BackupBundle\BackupConfiguration
 */
class FilesBackupConfiguration
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string[]
     */
    private $excludedPaths = [];

    /**
     * @var int
     */
    private $incrementalCopiesCount = 0;

    /**
     * FilesBackupConfiguration constructor.
     * @param string $path
     * @param string[] $excludedPaths
     * @param int $incrementalCopiesCount
     */
    public function __construct($path, array $excludedPaths, $incrementalCopiesCount)
    {
        $this->path = $path;
        $this->excludedPaths = $excludedPaths;
        $this->incrementalCopiesCount = $incrementalCopiesCount;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * @return string[]
     */
    public function getExcludedPaths()
    {
        return $this->excludedPaths;
    }

    /**
     * @return int
     */
    public function getIncrementalCopiesCount()
    {
        return $this->incrementalCopiesCount;
    }
}