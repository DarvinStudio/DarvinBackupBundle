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


use Darvin\BackupBundle\Storage\NullStorage;
use Darvin\BackupBundle\Storage\StorageInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NullStorageType extends AbstractStorageType
{
    /**
     * @param array $options
     *
     * @return StorageInterface
     */
    protected function buildStorage(array $options)
    {
        return new NullStorage();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'null';
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('title')
            ->addAllowedTypes('title', ['string'])
        ;
    }


}