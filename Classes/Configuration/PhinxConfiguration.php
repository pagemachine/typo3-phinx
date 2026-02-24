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
            'paths' => $this->getPaths(),
            'environments' => [
                'default_migration_table' => self::MIGRATION_TABLE_NAME,
                'default_environment' => 'typo3',
                'typo3' => [
                    'adapter' => 'mysql',
                    'host' => $connectionParameters['host'],
                    'port' => $connectionParameters['port'] ?? null,
                    'user' => $connectionParameters['user'],
                    'pass' => $connectionParameters['password'],
                    'name' => $connectionParameters['dbname'],
                    'unix_socket' => $connectionParameters['unix_socket'] ?? null,
                    'charset' => $connectionParameters['charset'],
                ],
            ],
        ];
    }

    private function getPaths(): array
    {
        if ($this->isLocatedInExtensionsPath()) {
            // <web-dir>/typo3conf/ext/*
            return [
                'migrations' => sprintf(
                    '%s/*/{Migrations,Classes/Migrations}/Phinx',
                    Environment::getExtensionsPath(),
                ),
                'seeds' => sprintf(
                    '%s/*/{Migrations,Classes/Migrations}/Phinx/Seeds',
                    Environment::getExtensionsPath(),
                ),
            ];
        }

        // <vendor-dir>/*/*
        return [
            'migrations' => sprintf(
                '%s/*/*/{Migrations,Classes/Migrations}/Phinx',
                $this->getVendorPath(),
            ),
            'seeds' => sprintf(
                '%s/*/*/{Migrations,Classes/Migrations}/Phinx/Seeds',
                $this->getVendorPath(),
            ),
        ];
    }

    private function isLocatedInExtensionsPath(): bool
    {
        return dirname(__DIR__, 3) === Environment::getExtensionsPath();
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
