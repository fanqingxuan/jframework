<?php

namespace App\Controllers;

use App\Services\UserService;

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

    public function list() {
        return response($this->userService->listUser());
    }
}