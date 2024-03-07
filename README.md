# Anatolii Nehelia Test API for bitango

## Run laravel application

You can run it using Docker with

```bash
sail up
```

Also run this command inside container to watch queue

```bash
php artisan queue:work
```

API is hosted on `http://localhost/api`

## DB Migrations and Seeds

To run migrations and seed countries table please run

```bash
php artisan migrate:fresh --seed
```

## Debug

Telescope available on `http://localhost/telescope/`
