<?php

namespace InnovaTec\Listeners;

use InnovaTec\Events\MessageStatusChangedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageStatusListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageStatusChangedEvent  $event
     * @return void
     */
    public function handle(MessageStatusChangedEvent $event)
    {
        //
    }
}
