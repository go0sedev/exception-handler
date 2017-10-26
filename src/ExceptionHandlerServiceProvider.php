<?php

namespace GustavTrenwith\ExceptionHandler;

use Illuminate\Support\ServiceProvider;

/**
 * Class ZeroDowntimeDeploymentServiceProvider
 * @package gustavtrenwith\exception_handler
 * @author Gustav Trenwith <gtrenwith@gmail.com>
 */
class ExceptionHandlerServiceProvider extends ServiceProvider {

    /**
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;

    /**
    * Bootstrap the application events.
    *
    * @return void
    */
    public function boot()
    {
        # Publish the config file
        $this->publishes([
            __DIR__.'/email.blade.php' => base_path('resources/views/emails/exception-handler/email.blade.php'),
        ]);
    }

    /**
    * Register the service provider.
    *
    * @return void
    */
    public function register()
    {

    }
}
