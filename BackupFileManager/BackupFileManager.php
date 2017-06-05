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


use Darvin\BackupBundle\BackupConfiguration\BackupConfiguration;

class BackupFileManager implements BackupFileManagerInterface
{
    /**
     * @var BackupConfiguration
     */
    private $backupConfiguration;

    /**
     * BackupFileManager constructor.
     * @param BackupConfiguration $backupConfiguration
     */
    public function __construct(BackupConfiguration $backupConfiguration)
    {
        $this->backupConfiguration = $backupConfiguration;
    }

    /**
     * @inheritDoc
     */
    public function findLastFullBackup($configName)
    {
        // TODO: Implement findLastFullBackup() method.
    }

    /**
     * @inheritDoc
     */
    public function findLastIncrementalBackups($configName)
    {
        // TODO: Implement findLastIncrementalBackups() method.
    }

    /**
     * @inheritDoc
     */
    public function findIncrementalBackupsForFullBackup($fullBackupPath)
    {
        // TODO: Implement findIncrementalBackupsForFullBackup() method.
    }

    /**
     * @inheritDoc
     */
    public function findAllFullBackups($configName)
    {
        // TODO: Implement findAllFullBackups() method.
    }

    /**
     * @inheritDoc
     */
    public function findNextFullBackup($prevFullBackupPath)
    {
        // TODO: Implement findNextFullBackup() method.
    }

    /**
     * @inheritDoc
     */
    public function getNewFullBackupPath($configName)
    {
        // TODO: Implement getNewFullBackupPath() method.
    }

    /**
     * @inheritDoc
     */
    public function getNewIncrementalBackupPath($fullBackupPath)
    {
        // TODO: Implement getNewIncrementalBackupPath() method.
    }

    /**
     * @inheritDoc
     */
    public function findAllDbBackups()
    {
        // TODO: Implement findAllDbBackups() method.
    }

    /**
     * @inheritDoc
     */
    public function getLastDbBackup()
    {
        // TODO: Implement getLastDbBackup() method.
    }
}