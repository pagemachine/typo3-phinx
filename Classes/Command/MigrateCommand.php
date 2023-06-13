<?php

declare(strict_types = 1);

namespace Pagemachine\Phinx\Command;

use Phinx\Console\Command\Migrate;

final class MigrateCommand extends Migrate
{
    use ConfigurationTrait;
    use AuthenticatedExecutionTrait;
}
