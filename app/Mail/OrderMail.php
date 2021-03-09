<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $textString;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($textString)
    {
        $this -> textString = $textString;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-replay@deliveboost.com')
            ->view('mail.orderMail');
    }
}
