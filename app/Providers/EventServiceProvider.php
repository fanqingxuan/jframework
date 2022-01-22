<?php

namespace App\Providers;

use App\Events\HelloEvent;
use App\Events\SampleEvent;
use App\Listeners\HelloListener;
use App\Listeners\SampleListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SampleEvent::class => [
            SampleListener::class,
        ],
        HelloEvent::class => [
            HelloListener::class
        ]
    ];
}
