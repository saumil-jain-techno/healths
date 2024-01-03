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

## Writing Tests

Imagine that your project features a global function called sum that adds two numbers together. To test this function, you would create a Tests\Unit\SumTest.php file with the following code.
```php
it('return of addition of numbers',function(){
    $sum = 5 + 2;
    $user = $user = \App\Models\User::factory()->create();
    $this->assertEquals($sum,6);
    
});
```

## Reference For Pest

- [Pest PHP](https://pestphp.com/)
- [Step by step to Pest PHP testing framework in Laravel 10 - DEV Community](https://dev.to/alphaolomi/step-by-step-to-pest-php-testing-framework-in-laravel-10-6e1)
- [Video Resources | Pest - The elegant PHP Testing Framework](https://pestphp.com/docs/video-resources)



## Laravel Termwind CSS

Termwind is a utility that shares similarities with Tailwind CSS but is specifically designed for PHP command-line applications. Its prime function is to facilitate developers to utilize the vast range of Tailwind CSS classes within their PHP code to enhance the visual output of the command line interface.

Termwind empowers you to construct distinctive command-line applications by harnessing the capabilities of the Tailwind CSS API.

By leveraging Tailwind CSS classes, developers can effortlessly improve the aesthetics and overall experience of their PHP applications, providing a more visually appealing and user-friendly interface.

## Installation

> **Requires [PHP 8.0+](https://php.net/releases/)**

Require Termwind using [Composer](https://getcomposer.org):

```bash
composer require nunomaduro/termwind
```
## Usage

```php
use function Termwind\{render};

// single line html...
render('<div class="px-1 bg-green-300">Termwind</div>');

// multi-line html...
render(<<<'HTML'
    <div>
        <div class="px-1 bg-green-600">Termwind</div>
        <em class="ml-1">
          Give your CLI apps a unique look
        </em>
    </div>
HTML);

//Example for calculating EMI

$principalAmount = $this->ask('Enter Principal Amount:');
$interestRate = $this->ask('Enter Annual Interest Rate (%):');
$loanTenure = $this->ask('Enter Loan Tenure (in months):');

$emi = $this->calculateEMI($principalAmount, $interestRate, $loanTenure);
$rows = [['EMI',$emi]];
$this->table(['Attribute', 'Value'], $rows);

return self::SUCCESS;
```

## Laravel Scribe

Scribe helps you generate API documentation for humans from your Laravel/Lumen/Dingo codebase.

## Requirements
The following tools are required to start the installation.

- PHP 8.0+
- [Composer](https://getcomposer.org/download/)

## Installation

First, add the package via Composer
```
composer require --dev knuckleswtf/scribe
```

Publish the config file by running
```
php artisan vendor:publish --tag=scribe-config
```


## Run Scribe

- Pick a type in config/scribe.php
  - static: This generates a simple index.html file (plus CSS and JS assets) in your public/docs folder. The routing of this file does not pass through Laravel, so you can't add auth or any middleware.
  - laravel: Scribe will generate a Blade view served via your Laravel app, allowing you to add auth or any middleware to your docs.
- Choose your routes
  - The second thing you'll need to do is tell Scribe what routes you want to document (the routes key). By default, it looks similar to this: In Config/scribe.php
- Do a test run
  - Now, let's do a test run. Run the command to generate your docs.
  ```
  php artisan scribe:generate
  ```
- Visit your newly generated docs:
  - If you're using static type, find the docs/index.html file in your public/ folder and open it in your browser.
    ```
    file:///var/www/html/health/public/docs/index.html
    ```

    - If you're using laravel type, start your app (php artisan serve), then visit /docs.
    ```
    http://127.0.0.1:8000/docs
    ```


## Reference For Scribe

- [Introduction | Scribe](https://scribe.knuckles.wtf/laravel/)
- [GitHub - knuckleswtf/TheSideProjectAPI: Demo API to demonstrate Scribe's capabilities](https://github.com/knuckleswtf/TheSideProjectAPI)
- [Configuration — Scribe documentation](https://scribe.readthedocs.io/en/latest/config.html)
- [Scribe documentation](https://scribe.readthedocs.io/en/latest/)

