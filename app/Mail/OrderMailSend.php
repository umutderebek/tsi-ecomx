<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMailSend extends Mailable
{
    use Queueable, SerializesModels;

    public $clientCode;
    public $items;
    public $orderId;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($clientCode,$items,$orderId)
    {

        $this->clientCode=$clientCode;
        $this->items=$items;
        $this->orderId=$orderId;


    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('form.ordermail');
    }
}
