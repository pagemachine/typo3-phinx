<?php

declare(strict_types=1);

namespace Pagemachine\Phinx\Command;

use Phinx\Console\Command\Status;

final class StatusCommand extends Status
{
    use ConfigurationTrait;
}
