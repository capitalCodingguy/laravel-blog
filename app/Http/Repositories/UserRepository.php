<?php

namespace App\Http\Repositories;

use App\User;
use Illuminate\Http\Request;

class UserRepository extends Repository
{
    static $tag = 'user';

    public function model()
    {
        return app(User::class);
    }

    public function get($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        return $user;
    }

    public function tag()
    {
        return UserRepository::$tag;
    }
}