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


use Darvin\BackupBundle\Storage\File\StorageFile;

class NullStorage extends AbstractStorage implements LocalStorageInterface
{
    /**
     * @return string
     */
    public function getPathForNewBackup()
    {
        return '/dev/null';
    }

    /**
     * @param callable $fileNameMatcher Callable function with $fileName in parameter, must return bool value,
     *                                  determine that the file is backup or not
     *
     * @return StorageFile[]
     */
    public function getListOfAllBackupFiles(callable $fileNameMatcher)
    {
        return [];
    }

    /**
     * @param string $filename
     *
     * @return void
     */
    public function removeBackupFile($filename)
    {

    }

    /**
     * @param string $filename
     *
     * @return StorageFile|null
     */
    public function findBackupFile($filename)
    {
        return null;
    }
}