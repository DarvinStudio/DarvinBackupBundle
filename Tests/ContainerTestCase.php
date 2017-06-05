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


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerTestCase extends KernelTestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->container = null;
        parent::tearDown();
    }

    /**
     * @param array $options
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected function getContainer(array $options = [])
    {
        if (!$this->container) {
            static::bootKernel($options);
            $this->container = static::$kernel->getContainer();
        }

        return $this->container;
    }
    
    public function testContainer()
    {
        $this->assertTrue($this->getContainer() instanceof ContainerInterface);
    }
}