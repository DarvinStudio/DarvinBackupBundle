<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\Storage\File;


/**
 * Class StorageFile
 * @package Darvin\BackupBundle\Storage
 */
class StorageFile
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @var int
     */
    private $fileSize;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * StorageFile constructor.
     *
     * @param string    $filename
     * @param int       $fileSize
     * @param \DateTime $createdAt
     */
    public function __construct($filename, $fileSize, \DateTime $createdAt)
    {
        $this->filename = $filename;
        $this->fileSize = $fileSize;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}