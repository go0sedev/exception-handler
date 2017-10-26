<?php

namespace GustavTrenwith\ExceptionHandler;

use Illuminate\Support\Facades\Facade;

/**
 * Class ZeroDowntimeDeploymentFacade
 * @package gustavtrenwith\exception_handler
 * @author Gustav Trenwith <gtrenwith@gmail.com>
 */
class ExceptionHandlerFacade extends Facade
{
    /**
     * Name of the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'exception_handler';
    }
}
