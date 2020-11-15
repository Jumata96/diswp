<?php

namespace InnovaTec\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSend extends Mailable
{
    use Queueable, SerializesModels;

   public $subject;
   public $message, $user;

    public function __construct($subject, $message, $user)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $this->subject($this->subject)                
            ->markdown('mails.sendMessage');
            return view('mails.index');
    }
}
