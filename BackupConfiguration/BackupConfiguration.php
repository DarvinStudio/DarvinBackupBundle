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
 * Class BackupConfiguration
 * @package Darvin\BackupBundle\BackupConfiguration
 */
class BackupConfiguration
{
    /**
     * @var string
     */
    private $backupDir;

    /**
     * @var bool
     */
    private $backupDatabase = false;

    /**
     * @var FilesBackupConfiguration[]
     */
    private $filesConfiguration = [];

    /**
     * BackupConfiguration constructor.
     * @param string $backupDir
     * @param bool $backupDatabase
     * @param FilesBackupConfiguration[] $filesConfiguration
     */
    public function __construct($backupDir = null, $backupDatabase = false, array $filesConfiguration = [])
    {
        $this->backupDir = $backupDir;
        $this->backupDatabase = $backupDatabase;
        $this->filesConfiguration = $filesConfiguration;
    }

    /**
     * @return string
     */
    public function isBackupDir()
    {
        return $this->backupDir;
    }

    /**
     * @param string $backupDir
     * @return $this
     */
    public function setBackupDir($backupDir)
    {
        $this->backupDir = $backupDir;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBackupDatabase()
    {
        return $this->backupDatabase;
    }

    /**
     * @param bool $backupDatabase
     * @return $this
     */
    public function setBackupDatabase($backupDatabase)
    {
        $this->backupDatabase = $backupDatabase;
        return $this;
    }

    /**
     * @return FilesBackupConfiguration[]
     */
    public function getFilesConfiguration()
    {
        return $this->filesConfiguration;
    }

    /**
     * @param FilesBackupConfiguration[] $filesConfiguration
     * @return $this
     */
    public function setFilesConfiguration($filesConfiguration)
    {
        $this->filesConfiguration = $filesConfiguration;
        return $this;
    }

    /**
     * @param FilesBackupConfiguration $filesBackupConfiguration
     * @return $this
     */
    public function addFilesConfiguration(FilesBackupConfiguration $filesBackupConfiguration) 
    {
        $this->filesConfiguration[] = $filesBackupConfiguration;
        return $this;
    }

    /**
     * @param FilesBackupConfiguration $filesBackupConfiguration
     * @return $this
     */
    public function removeFilesConfiguration(FilesBackupConfiguration $filesBackupConfiguration) 
    {
        $key = array_search($filesBackupConfiguration, $this->filesConfiguration);
        if ($key !== false) {
            unset($this->filesConfiguration[$key]);
        }
        
        return $this;
    }
}