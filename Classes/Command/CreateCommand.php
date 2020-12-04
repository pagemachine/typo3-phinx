<?php
declare(strict_types = 1);

namespace Pagemachine\Phinx\Command;

use Phinx\Console\Command\Create;

final class CreateCommand extends Create
{
    use ConfigurationTrait;
}
