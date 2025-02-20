<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Phinx Database Migrations',
    'description' => 'Phinx integration for TYPO3',
    'category' => 'misc',
    'author' => 'Mathias Brodala',
    'author_email' => 'mbrodala@pagemachine.de',
    'author_company' => 'Pagemachine AG',
    'state' => 'stable',
    'version' => '1.1.11',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
    ],
];
