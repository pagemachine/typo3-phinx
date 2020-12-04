<?php
declare(strict_types = 1);

namespace Pagemachine\Phinx\Command;

use Phinx\Console\Command\SeedCreate;

final class SeedCreateCommand extends SeedCreate
{
    use ConfigurationTrait;
}
