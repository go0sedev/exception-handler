# Exception Handler
An exception handler for Laravel websites that will catch and forward exception via email to the website administrator.

## Server Requirements
The following packages need to be installed on the server:
```bash
git
composer
php 7.1
nginx
```

## Installation with Composer
Run the following command in your project to add this package:
```bash
composer require gustavtrenwith/exception_handler
```
Then run `composer update`.

## Register Service Provider and Facade

Register the service providers and Facades in `config/app.php`.
```php
GustavTrenwith\ExceptionHandler\ExceptionHandlerServiceProvider::class,
```
```php
'ExceptionHandler' => GustavTrenwith\ExceptionHandler\ExceptionHandlerFacade::class,
```

Now you can use the `ExceptionHandler` facade anywhere in your application.

## Environment Setup
You need to add the following to your .env file. Then you can easily disable the exception emails by changing the variable value to true.
```
DISABLE_EXCEPTION_EMAILS=false
WEBMASTER_EMAIL=<YOUR_EMAIL_ADDRESS>
```

## Exception Handler Setup
Now you are all set. Just paste the following line in the `report()` method in the `app\Exceptions\Handler.php` file.
```php
\GustavTrenwith\ExceptionHandler\ExceptionHandler::handle($exception, env('WEBMASTER_EMAIL', ''));
```

## Feedback
For any questions or suggestions, feel free to contact me on `gtrenwith@gmail.com`
