<?php

namespace InnovaTec\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseUser extends Mailable
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
        return $this->subject('Compra de Productos')                
                    ->markdown('mails.purchaseUser');
    }
}
