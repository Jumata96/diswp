<?php

namespace InnovaTec\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseUserToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase, $details;

    public function __construct($purchase, $details)
    {
       $this->purchase = $purchase;
       $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva Compra de Productos')->markdown('mails.purchaseUserToAdmin');
    }
}
