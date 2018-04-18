<?php

namespace Gutter\HybridAuth\DI;

use Gutter\HybridAuth\Manager;
use Nette\DI\CompilerExtension;

class HybridAuthExtension extends CompilerExtension
{
    /** @var array */
    public $defaults = [];

    public function loadConfiguration()
    {
        $config = $this->getConfig($this->defaults);

        $builder = $this->getContainerBuilder();
        $builder->addDefinition($this->prefix('service'))
            ->setFactory(Manager::class, [$config]);
    }
}
