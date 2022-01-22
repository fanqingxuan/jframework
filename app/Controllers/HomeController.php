<?php

namespace App\Controllers;

use App\Events\SampleEvent;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller {

    /**
     *
     * @var \App\Services\UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        return response()->json([11,22,33]);
    }

    public function list(Request $request) {
        return response([
            env("DB_HOST","localhost"),
            config("database.default","test"),
            url('test'),
            URL::current(),
            $request->method()
        ]);
    }

    public function test_event() {
        //event(new SampleEvent($this->userService->listUser()));
        // Event::dispatch(new SampleEvent($this->userService->listUser()));
        SampleEvent::dispatch($this->userService->listUser());

        Log::info("这是info");
        Log::debug("这是debug");
        Log::warning("这是warning");
        Log::notice("这是notice");
        Log::error("这是error");
        return [];
    }
}