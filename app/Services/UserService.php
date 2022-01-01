<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserService {

    public function listUsers() {
        return DB::select("SELECT * FROM post");
    }
}