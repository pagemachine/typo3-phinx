<?php

declare(strict_types = 1);

namespace Pagemachine\Phinx\Command;

use Phinx\Console\Command\Rollback;

final class RollbackCommand extends Rollback
{
    use ConfigurationTrait;
}
