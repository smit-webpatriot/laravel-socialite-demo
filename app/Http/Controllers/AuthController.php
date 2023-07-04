<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // public function login()
    // {

    // }

    // public function register()
    // {

    // }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Callback method for all social callback
     */
    public function callback()
    {

    }
}
