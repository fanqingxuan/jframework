<?php

namespace App\Controllers;

use App\Events\SampleEvent;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Kint\Kint;

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
        p($this->userService->listUser(),$this);
        
        Log::info("这是info");
        Log::debug("这是debug");
        Log::warning("这是warning");
        Log::notice("这是notice");
        Log::error("这是error");
        Storage::disk("local")->put("file.txt","this is contents");
        p(Storage::disk("local")->exists("file.txt"));
        p(File::isFile("file.txt"));
        return Storage::url("a.txt");
    }

    public function test_redis() {
        
    }
}