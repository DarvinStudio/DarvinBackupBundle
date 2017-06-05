<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\BackupFileManager;


/**
 * Interface BackupFileManagerInterface
 * @package Darvin\BackupBundle\BackupFileManager
 */
interface BackupFileManagerInterface
{
    /**
     * Return last full backup path or null if it does't exist
     *
     * @param $configName
     * @return null|string
     */
    public function findLastFullBackup($configName);

    /**
     * Return all last incremental backup's paths, sorted by created time
     *
     * @param $configName
     * @return \string[]
     */
    public function findLastIncrementalBackups($configName);

    /**
     * Return all incremental backup's paths for full backup, sorted by created time
     * 
     * @param string $fullBackupPath
     * @return string[]
     */
    public function findIncrementalBackupsForFullBackup($fullBackupPath);

    /**
     * Return all full backup's paths, sorted by created time
     *
     * @param $configName
     * @return \string[]
     */
    public function findAllFullBackups($configName);

    /**
     * Return path for next full backup, created after $prevFullBackupPath
     * 
     * @param $prevFullBackupPath
     * @return string|null
     */
    public function findNextFullBackup($prevFullBackupPath);

    /**
     * Generate new full backup path
     *
     * @param $configName
     * @return string
     */
    public function getNewFullBackupPath($configName);

    /**
     * Generate new incremental backup path
     * 
     * @param string $fullBackupPath
     * @return string
     */
    public function getNewIncrementalBackupPath($fullBackupPath);

    /**
     * Return all db backup's paths, sorted by created time 
     * 
     * @return string[]
     */
    public function findAllDbBackups();

    /**
     * Return path for last db backup on null if it does't exist
     * 
     * @return string|null
     */
    public function getLastDbBackup();
}