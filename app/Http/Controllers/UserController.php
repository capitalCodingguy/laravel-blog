<?php

namespace App\Http\Controllers;

// use App\Http\Repositories\ImageRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // protected $imageRepository;

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        // $this->middleware('auth', ['except' => 'show']);
    }

    public function profile() {
        return $user = auth()->user();
    }
}