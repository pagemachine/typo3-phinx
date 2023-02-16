<?php
declare(strict_types = 1);

namespace Pagemachine\Phinx\Configuration;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class PhinxConfiguration
{
    public const MIGRATION_TABLE_NAME = 'tx_phinx_log';

    public function toArray(): array
    {
        $extensionsPath = Environment::getExtensionsPath();
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable(self::MIGRATION_TABLE_NAME);

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
                'default_migration_table' => self::MIGRATION_TABLE_NAME,
                'default_environment' => 'typo3',
                'typo3' => $this->getEnvironment($connection),
            ],
        ];
    }

    private function getEnvironment(Connection $connection): array
    {
        switch ($connection->getDatabasePlatform()->getName()) {
            case 'sqlite':
                $pathInfo = pathinfo($connection->getDatabase());
                $name = $pathInfo['dirname'] . '/' . $pathInfo['filename'];
                $suffix = '.' . $pathInfo['extension'];

                return [
                    'adapter' => 'sqlite',
                    'name' => $name,
                    'suffix' => $suffix,
                ];
            case 'mssql':
                $adapter = 'sqlsrv';
                break;

            case 'postgresql':
                $adapter = 'pgsql';
                break;

            case 'mysql':
                $adapter = 'mysql';
                break;

            default:
                return [];
        }

        return [
            'adapter' => $adapter,
            'host' => $connection->getParams()['host'] ?? null,
            'port' => $connection->getParams()['port'] ?? null,
            'user' => $connection->getParams()['user'] ?? null,
            'pass' => $connection->getParams()['password'] ?? null,
            'name' => $connection->getDatabase(),
            'unix_socket' => $connection->getParams()['unix_socket'] ?? null,
            'charset' => $connection->getParams()['charset'] ?? null,
        ];
    }
}
