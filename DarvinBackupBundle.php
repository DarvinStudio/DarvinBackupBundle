<?php

namespace Darvin\BackupBundle;

use Darvin\BackupBundle\DependencyInjection\Compiler\StorageTypeCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DarvinBackupBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new StorageTypeCompilerPass());
    }
}
