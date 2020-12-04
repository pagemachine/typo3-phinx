<?php
declare(strict_types = 1);

namespace Pagemachine\Phinx\Configuration;

use TYPO3\CMS\Core\Core\Environment;

final class PhinxConfiguration
{
    public function toArray(): array
    {
        $extensionsPath = Environment::getExtensionsPath();
        $connectionParameters = $this->getConnectionParameters();

        return [
            'paths' => [
                'migrations' => sprintf(
                    '%s/*/{Migrations,Classes/Migrations}/Phinx',
                    $extensionsPath
                ),
                'seeds' => sprintf(
                    '%s/*/{Migrations,Classes/Migrations}/Phinx/Seeds',
                    $extensionsPath
                ),
            ],
            'environments' => [
                'default_migration_table' => 'tx_phinx_log',
                'default_environment' => 'typo3',
                'typo3' => [
                    'adapter' => 'mysql',
                    'host' => $connectionParameters['host'],
                    'port' => $connectionParameters['port'],
                    'user' => $connectionParameters['user'],
                    'pass' => $connectionParameters['password'],
                    'name' => $connectionParameters['dbname'],
                    'unix_socket' => $connectionParameters['unix_socket'] ?? null,
                    'charset' => $connectionParameters['charset'],
                ],
            ],
        ];
    }

    private function getConnectionParameters(): array
    {
        return $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'];
    }
}
