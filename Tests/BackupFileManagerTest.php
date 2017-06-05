<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\Tests;

use Darvin\BackupBundle\BackupFileManager\BackupFileManager;
use Darvin\BackupBundle\BackupFileManager\BackupFileManagerInterface;

class BackupFileManagerTest extends ContainerTestCase
{
    public function testContainerService()
    {
        $backupFileManager = $this->getContainer()->get('darvin_backup.backup_file_manager');
        $this->assertInstanceOf(BackupFileManager::class, $backupFileManager);
        $this->assertInstanceOf(BackupFileManagerInterface::class, $backupFileManager);
    }
}
