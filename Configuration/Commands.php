<?php

return [
    'phinx:create' => [
        'class' => \Pagemachine\Phinx\Command\CreateCommand::class,
        'schedulable' => false,
    ],
    'phinx:migrate' => [
        'class' => \Pagemachine\Phinx\Command\MigrateCommand::class,
        'schedulable' => false,
    ],
    'phinx:rollback' => [
        'class' => \Pagemachine\Phinx\Command\RollbackCommand::class,
        'schedulable' => false,
    ],
    'phinx:status' => [
        'class' => \Pagemachine\Phinx\Command\StatusCommand::class,
        'schedulable' => false,
    ],
    'phinx:seed:create' => [
        'class' => \Pagemachine\Phinx\Command\SeedCreateCommand::class,
        'schedulable' => false,
    ],
    'phinx:seed:run' => [
        'class' => \Pagemachine\Phinx\Command\SeedRunCommand::class,
        'schedulable' => false,
    ],
];
