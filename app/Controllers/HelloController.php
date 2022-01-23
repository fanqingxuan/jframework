<?php

namespace App\Controllers;

use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        dump($request->username);
        dd($this);
    }
}
