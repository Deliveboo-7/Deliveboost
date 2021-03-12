<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cartList;
    public $email;
    public $restName;
    public $orderCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cartList, $email, $restName, $orderCode)
    {
        $this -> cartList = $cartList;
        $this -> email = $email;
        $this -> restName = $restName;
        $this -> orderCode = $orderCode;
        
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
