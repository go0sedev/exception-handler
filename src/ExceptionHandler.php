<?php

namespace GustavTrenwith\ExceptionHandler;

use Exception;
use Illuminate\Support\Facades\App;

/**
 * Class ExceptionHandler
 * @package gustavtrenwith\exception_handler
 * @author Gustav Trenwith <gtrenwith@gmail.com>
 */
class ExceptionHandler
{
    /**
     * Sends the exception to the website administrator if the exception message is not empty and the
     * DISABLE_EXCEPTION_EMAILS environment variable is not set to true and the email address is valid.
     * @param Exception $exception
     * @param string $email
     * @return boolean
     */
    public static function handle(Exception $exception, $email = '')
    {
        if (env('DISABLE_EXCEPTION_EMAILS', false)) {
            return false;
        }

        if (empty($exception->getMessage())) {
            return false;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }

        $exceptionMessage = "";
        $exceptionMessage .= "Message: ".$exception->getMessage()."\r\n";
        $exceptionMessage .= "URL: ".request()->getPathInfo()."\r\n";
        $exceptionMessage .= "File: ".$exception->getFile()."\r\n";
        $exceptionMessage .= "Line: ".$exception->getLine()."\r\n";
        $exceptionMessage .= "Trace: ".$exception->getTraceAsString()."\r\n";

        Mail::to($email)
            ->from('exceptions@' . env('APP_URL'))
            ->subject('Exception Caught on ' . env('APP_URL'))
            ->send(new ExceptionEmail('The following exception was caught on ' . env('APP_URL') . ':<br/>' . nl2br($exceptionMessage)));

        return true;
    }
}
