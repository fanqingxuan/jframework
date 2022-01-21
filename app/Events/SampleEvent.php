<?php

namespace App\Events;

class SampleEvent extends Event
{

    public $userlist;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userlist)
    {
        $this->userlist = $userlist;
    }
}
