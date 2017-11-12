<?php
/**
 * @author    Lev Semin <lev@darvin-studio.ru>
 * @copyright Copyright (c) 2017, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\BackupBundle\Storage\Type;


use Darvin\BackupBundle\Storage\StorageInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractStorageType implements StorageTypeInterface
{
    /**
     * @param array $options
     *
     * @return StorageInterface
     */
    public function getStorageObject(array $options)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('max_copies_count')
            ->setRequired('max_backup_size')
            ->setAllowedTypes('max_copies_count', ['int', 'null'])
            ->setAllowedTypes('max_backup_size', ['int', 'null'])
            ->setDefaults([
                'max_copies_count' => null,
                'max_backup_size'  => null
            ])
        ;

        $this->configureOptions($resolver);

        return $this->buildStorage($resolver->resolve($options));
    }

    /**
     * @param array $options
     *
     * @return StorageInterface
     */
    protected abstract function buildStorage(array $options);

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public abstract function configureOptions(OptionsResolver $resolver);
}