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

interface StorageInterface
{
    /**
     * @param callable $fileNameMatcher Callable function with $fileName in parameter, must return bool value,
     *                                  determine that the file is backup or not
     *
     * @return StorageFile[]
     */
    public function getListOfAllBackupFiles(callable $fileNameMatcher);

    /**
     * @param string $filename
     *
     * @return void
     */
    public function removeBackupFile($filename);

    /**
     * @param string $filename
     *
     * @return StorageFile|null
     */
    public function findBackupFile($filename);

    /**
     * @return int|null maximum allowed size in bytes,
     *                  null - infinity
     */
    public function getMaxUsedSize();

    /**
     * @return int|null maximum allowed count of copies,
     *                  null - infinity
     */
    public function getMaxCopiesCount();
}