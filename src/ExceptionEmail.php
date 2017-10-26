<?php

namespace GustavTrenwith\ExceptionHandler;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class ExceptionEmail
 * @package GustavTrenwith\ExceptionHandler
 * @author Gustav Trenwith <gtrenwith@gmail.com>
 */
class ExceptionEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $site;
    protected $message;

    /**
     * Create a new message instance.
     * @param string $message
     */
    public function __construct($message = '')
    {
        $this->site = (string) str_replace("http://", "", env('APP_URL'));
        $this->site = (string) str_replace("https://", "", $this->site);
        $this->message = (string) $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.exception-handler.email')
            ->from('exceptions@' . $this->site)
            ->subject('Exception caught on ' . $this->site)
            ->with('message', $this->message);
    }
}
