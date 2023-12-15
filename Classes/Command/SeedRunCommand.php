<?php

declare(strict_types=1);

namespace Pagemachine\Phinx\Command;

use Phinx\Console\Command\SeedRun;

final class SeedRunCommand extends SeedRun
{
    use ConfigurationTrait;
    use AuthenticatedExecutionTrait;
}
