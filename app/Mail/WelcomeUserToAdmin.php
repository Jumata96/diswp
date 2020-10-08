<?php

namespace InnovaTec\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeUserToAdmin extends Mailable
{
    use Queueable, SerializesModels;

   public $newUser;

    public function __construct($newUser)
    {
        $this->newUser = $newUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Usuario registrado en la web')->markdown('mails.welcomeUserToAdmin');
    }
}
