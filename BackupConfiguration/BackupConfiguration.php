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
    private $title;

    /**
     * @var bool
     */
    private $backupDatabase = false;

    /**
     * @var FilesBackupConfiguration[]
     */
    private $filesConfiguration = [];

    /**
     * @var StorageConfiguration
     */
    private $storageConfiguration;

    /**
     * BackupConfiguration constructor.
     *
     * @param StorageConfiguration       $storageConfiguration
     * @param string                     $title
     * @param bool                       $backupDatabase
     * @param FilesBackupConfiguration[] $filesConfiguration
     */
    public function __construct(
        StorageConfiguration $storageConfiguration,
        $title,
        $backupDatabase = false,
        array $filesConfiguration = []
    ) {
        $this->title = $title;
        $this->storageConfiguration = $storageConfiguration;
        $this->backupDatabase = $backupDatabase;
        $this->filesConfiguration = $filesConfiguration;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     *
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
     *
     * @return $this
     */
    public function setFilesConfiguration($filesConfiguration)
    {
        $this->filesConfiguration = $filesConfiguration;

        return $this;
    }

    /**
     * @param FilesBackupConfiguration $filesBackupConfiguration
     *
     * @return $this
     */
    public function addFilesConfiguration(FilesBackupConfiguration $filesBackupConfiguration)
    {
        $this->filesConfiguration[] = $filesBackupConfiguration;

        return $this;
    }

    /**
     * @param FilesBackupConfiguration $filesBackupConfiguration
     *
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