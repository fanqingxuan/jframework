<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use App\Models\Post;
use App\Services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     *
     * @var \App\Services\UserService
     */
    private $userService;

    public function __construct(UserService $userService )
    {
        $this->userService = $userService;
    }

    public function index() {
        return response($this->userService->listUsers());
    }

    public function list(Request $request) {
        return response(Post::all());
    }

}