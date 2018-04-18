<?php

namespace David\HybridAuth\DI;

class HybridAuthExtension extends \Nette\DI\CompilerExtension
{
    /** @var array */
    public $defaults = [];

    public function loadConfiguration()
    {
        $config = $this->getConfig($this->defaults);

        $builder = $this->getContainerBuilder();
        $builder->addDefinition($this->prefix('service'))
            ->setClass(\David\HybridAuth\Manager::class, [$config]);
    }
}
