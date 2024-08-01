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

## Migrations

The following paths are used for migrations:

* `vendor/*/*/Migrations/Phinx`
* `vendor/*/*/Classes/Migrations/Phinx`

The following paths are used for TYPO3v11 and older:

* `typo3conf/ext/*/Migrations/Phinx`
* `typo3conf/ext/*/Classes/Migrations/Phinx`

Examples to create a migration in a TYPO3 project:

* `typo3cms phinx:create --path packages/provider/Classes/Migrations/Phinx MyMigration`

**Note**

If **one** `Migrations` directory exists already, you can omit `--path`.
However, should multiple exist, you will receive a prompt and have to select
the desired location.

## Seeds

The following paths are used for seeds:

* `vendor/*/*/Migrations/Phinx/Seeds`
* `vendor/*/*/Classes/Migrations/Phinx/Seeds`

The following paths are used for TYPO3v11 and older:

* `typo3conf/ext/*/Migrations/Phinx/Seeds`
* `typo3conf/ext/*/Classes/Migrations/Phinx/Seeds`

Examples to create a seed in a TYPO3 project:

* `typo3cms phinx:seed:create --path packages/provider/Classes/Migrations/Phinx/Seed MySeeder`

**Note**

If **one** `Migrations/Seed` directory exists already, you can omit `--path`.
However, should multiple exist, you will receive a prompt and have to select
the desired location.

## Testing

All tests can be executed with the shipped Docker Compose definition:

    docker compose run --rm app composer build
