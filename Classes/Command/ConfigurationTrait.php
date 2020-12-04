<?php
declare(strict_types = 1);

namespace Pagemachine\Phinx\Command;

use Pagemachine\Phinx\Configuration\PhinxConfiguration;
use Phinx\Config\Config;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

trait ConfigurationTrait
{
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->setConfig(new Config((new PhinxConfiguration())->toArray()));
    }
}
