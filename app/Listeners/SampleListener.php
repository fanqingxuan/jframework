<?php

namespace App\Listeners;

use App\Events\SampleEvent;
use Illuminate\Database\Eloquent\Collection;

class SampleListener
{

    private $userlist;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SampleEvent  $event
     * @return void
     */
    public function handle(SampleEvent $event)
    {
        dd($event->userlist);
    }
}
