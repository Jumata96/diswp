<?php

namespace InnovaTec\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'InnovaTec\Events\Event' => [
            'InnovaTec\Listeners\EventListener',
        ],
        'InnovaTec\Events\MessageStatusChangedEvent' => [
            'InnovaTec\Listeners\MessageStatusListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
