<?php

declare(strict_types=1);

namespace Pagemachine\Phinx\Configuration;

use TYPO3\CMS\Core\Core\Environment;

final class PhinxConfiguration
{
    public const MIGRATION_TABLE_NAME = 'tx_phinx_log';

    public function toArray(): array
    {
        $connectionParameters = $this->getConnectionParameters();

        return [
            'paths' => [
                'migrations' => [
                    sprintf('%s/migrations/phinx', Environment::getProjectPath()),
                    sprintf(
                        '%s/*/*/{Migrations,Classes/Migrations}/Phinx',
                        $this->getVendorPath(),
                    ),
                ],
                'seeds' => [
                    sprintf('%s/migrations/phinx/seeds', Environment::getProjectPath()),
                    sprintf(
                        '%s/*/*/{Migrations,Classes/Migrations}/Phinx/Seeds',
                        $this->getVendorPath(),
                    ),
                ],
            ],
            'environments' => [
                'default_migration_table' => self::MIGRATION_TABLE_NAME,
                'default_environment' => 'typo3',
                'typo3' => array_filter([
                    'adapter' => 'mysql',
                    'host' => $connectionParameters['host'] ?? null ?: null,
                    'port' => $connectionParameters['port'] ?? null ?: null,
                    'user' => $connectionParameters['user'] ?? null ?: null,
                    'pass' => $connectionParameters['password'] ?? null ?: null,
                    'name' => $connectionParameters['dbname'] ?? null ?: null,
                    'unix_socket' => $connectionParameters['unix_socket'] ?? null ?: null,
                    'charset' => $connectionParameters['charset'] ?? null ?: null,
                    'dsn' => $connectionParameters['url'] ?? null ?: null,
                ]),
            ],
        ];
    }

    private function getVendorPath(): string
    {
        return dirname(__DIR__, 4);
    }

    private function getConnectionParameters(): array
    {
        return $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'];
    }
}
