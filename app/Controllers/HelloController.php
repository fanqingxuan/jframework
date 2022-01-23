<?php

namespace App\Controllers;

class HelloController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        dump($this);
        dd($this);
    }
}
