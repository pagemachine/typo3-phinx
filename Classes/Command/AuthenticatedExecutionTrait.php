<?php

declare(strict_types=1);

namespace Pagemachine\Phinx\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Core\Bootstrap;

trait AuthenticatedExecutionTrait
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Make sure the _cli_ user is loaded
        Bootstrap::initializeBackendAuthentication();

        return parent::execute($input, $output);
    }
}
