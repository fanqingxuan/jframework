<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class UserService {

    public function listUser() {
        return DB::table("post")->limit(5)->get();
        return Post::offset(2)->limit(2)->get();
    }
}