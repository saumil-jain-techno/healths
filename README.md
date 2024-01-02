## Laravel Health
Laravel Health might refer to various aspects within the Laravel framework or the broader ecosystem related to maintaining and assessing the health of Laravel applications.

Laravel Health typically refers to the state, performance, and reliability of Laravel applications. It encompasses various aspects of monitoring, maintaining, and ensuring the optimal functioning of Laravel-based systems.

## Installation Health

You can install the package via the composer
```
composer require spatie/laravel-health
```

you can publish the health config file with this command.
```
php artisan vendor:publish --tag="health-config"
```

Migrating the database
```
php artisan vendor:publish --tag="health-migrations"
php artisan migrate
```

## Usage

- Registering your check
  You can register the checks you want to run, by passing an array with checks to     Spatie\Health\Facades\Health::check().

  You can register checks in the default service provider file (app/Providers/AppServiceProvider.php) or you can create your service provider

- Manually Running Check
  You can also decide to manually run the command with:
  ```
  php artisan health:check
  ```

- Using Endpoints Running Check
    create a route for check health
    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    use Spatie\Health\Http\Controllers\HealthCheckResultsController;
    
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('health', HealthCheckResultsController::class);
    ```
    Now run the route to check the application's health
    ```
    http://127.0.0.1:8000/health
    ```

## Reference

- [Introduction | laravel-health | Spatie](https://spatie.be/docs/laravel-health/v1/introduction)
- [GitHub - spatie/laravel-health: Check the health of your Laravel app](https://github.com/spatie/laravel-health)
