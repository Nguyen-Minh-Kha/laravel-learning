# Some useful command line for working with laravel

## Create a controller

```
php artisan make:controller <name of controller>
```

## Create a ressource controller

```
php artisan make:controller <name of controller> --resource
```
---
## Check routes

```
php artisan route:list
```
---
## migration

```
php artisan migrate
```

## create a migration table (create a table for db)

```
php artisan make:migration <name of migration> --create=<table name>

ex:

php artisan make:migration create_table_articles --create=articles
``` 

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