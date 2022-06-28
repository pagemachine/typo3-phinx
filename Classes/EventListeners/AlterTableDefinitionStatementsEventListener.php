<?php

declare(strict_types = 1);

namespace Pagemachine\Phinx\EventListeners;

use Doctrine\DBAL\Schema\Table;
use Pagemachine\Phinx\Configuration\PhinxConfiguration;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\Event\AlterTableDefinitionStatementsEvent;

final class AlterTableDefinitionStatementsEventListener
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function addPhinxMigrationTableSchema(AlterTableDefinitionStatementsEvent $event): void
    {
        $schemaManager = $this->connection->getSchemaManager();

        if (!$schemaManager->tablesExist(PhinxConfiguration::MIGRATION_TABLE_NAME)) {
            return;
        }

        $table = $schemaManager->listTableDetails(PhinxConfiguration::MIGRATION_TABLE_NAME);
        $schemaTableSQL = $this->buildSchemaTableSQL($this->removeColumnCollations($table));

        $event->addSqlData($schemaTableSQL);
    }

    /**
     * Remove COLLATE option from columns which are not supported by TYPO3
     */
    private function removeColumnCollations(Table $table): Table
    {
        $table->getColumn('migration_name')
            ->setPlatformOptions([]);

        return $table;
    }

    private function buildSchemaTableSQL(Table $table): string
    {
        $platform = $this->connection->getDatabasePlatform();

        return sprintf('%s;', $platform->getCreateTableSQL($table)[0]);
    }
}
