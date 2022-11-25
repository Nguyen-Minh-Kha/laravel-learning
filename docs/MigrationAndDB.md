## Migration
```
php artisan migrate
```

## create a migration table (create a table for db)

```
php artisan make:migration <name of migration> --create=<table name>

ex:

php artisan make:migration create_table_articles --create=articles
``` 

## create a migration to add infos into an already created table

```
php artisan make:migration <name of migration> --table=<table name>
```
---
## revert last migration

```
php artisan migrate:rollback
```

## revert last x migration

```
php artisan migrate:rollback --step=x
```

## reset all migrations

```
php artisan migrate:reset
```

## refresh all migrations
```
php artisan migrate:fresh
```
