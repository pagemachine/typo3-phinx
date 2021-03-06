# Phinx integration for TYPO3 ![CI](https://github.com/pagemachine/typo3-phinx/workflows/CI/badge.svg)

This package provides a integration of the [Phinx](https://phinx.org) database migration tool for TYPO3.

All Phinx commands have been wrapped as `phinx:<command>` and can be executed using the TYPO3 CLI or TYPO3 Console:

```
# Create a new migration
typo3cms phinx:create

# Migrate the database
typo3cms phinx:migrate

# Rollback the last or to a specific migration
typo3cms phinx:rollback

# Show migration status
typo3cms phinx:status

# Create a new database seeder
typo3cms phinx:seed:create

# Run database seeders
typo3cms phinx:seed:run
```

Notice that these wrapper commands are executed by TYPO3, thus the full API like `DataHandler` can be used in migrations.

The following paths are used for migrations:

* `typo3conf/ext/*/Migrations/Phinx`
* `typo3conf/ext/*/Classes/Migrations/Phinx`

The following paths are used for seeds:

* `typo3conf/ext/*/Migrations/Phinx/Seeds`
* `typo3conf/ext/*/Classes/Migrations/Phinx/Seeds`

## Testing

All tests can be executed with the shipped Docker Compose definition:

    docker-compose run --rm app composer build
