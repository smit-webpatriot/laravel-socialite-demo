<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;


class SocialController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Callback method for facebok
     */
    public function callbackGoogle(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::whereGoogleId($googleUser->id)->first();

            if($user){
                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);
            }

            $user = User::whereEmail($googleUser->email)->first();

            if($user){
                if($user->password != null){
                    return redirect()->route('login')->withError("Email id Already registed, Try to Login with password");
                }else{
                    return redirect()->route('login')->withError("Email id Already registed with another social account");
                }
            }

            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
            ]);

            Auth::login($user);
            
            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    /**
     * Callback method for facebok
     */
    public function callbackFacebook(Request $request)
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::whereFacebookId($facebookUser->id)->first();

            if($user){
                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);
            }

            $user = User::whereEmail($facebookUser->email)->first();

            if($user){
                if($user->password != null){
                    return redirect()->route('login')->withError("Email id Already registed, Try to Login with password");
                }else{
                    return redirect()->route('login')->withError("Email id Already registed with another social account");
                }
            }

            $user = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
            ]);

            Auth::login($user);
            
            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
