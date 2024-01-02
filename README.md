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


## Laravel Pest

Pest is a modern testing framework for PHP applications that provides a more readable and expressive syntax for writing tests. Nuno Maduro, a well-known PHP contributor, created it.

Using the Pest framework, developers can write tests that are easy to read, understand, and maintain. It offers a clean and elegant syntax that allows developers to focus on writing tests that accurately reflect the behavior of their application, rather than getting bogged down in boilerplate code or complex testing syntax.

It is important to mention that the Pest framework is built as an abstraction layer upon PHPUnit and these two testing frameworks are completely interoperable. In practice, developers can use functionalities of both frameworks to their liking, either in the same or separate test cases on their projects.

One handy feature that Pest includes is the possibility of using PHP’s anonymous functions and closures to create a more readable and expressive syntax. This allows developers to write tests that read like natural language, making it easier to understand what the test is doing and what it is testing.

The Pest framework also offers several advanced features, such as test doubles, dependency injection, and parallel testing, to help developers write more effective tests with less code.

## Requirements
The following tools are required to start the installation.

- PHP 8.1+
- [Composer](https://getcomposer.org/download/)

## Pest Installation

1. The first step is to require Pest as a "dev" dependency in your project by running the following command on your command line.
   ```
   composer require pestphp/pest --dev --with-all-dependencies
   ```
2. Secondly, you'll need to initialize Pest in your current PHP project. This step will create a configuration file named Pest.php at the root level of your test suite, which will enable you to fine-tune your test suite later.
   ```
   ./vendor/bin/pest --init
   ```
3. Finally, you can run your tests by executing the pest command.
   ```
   ./vendor/bin/pest
   ```


