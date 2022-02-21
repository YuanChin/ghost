<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class FacebookController extends Controller
{
    /**
     * Login with Facebook
     *
     * @return void
     */
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Rediredtion URI
     *
     * @return void
     */
    public function callback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $facebookUser->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/');
            } else {
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'email_verified_at' => Carbon::now()->toDateTimeString(),
                    'facebook_id' => $facebookUser->id,
                    'password' => encrypt(substr("$facebookUser->email", 5, -5) . "salt")
                ]);

                Auth::login($user);
                return redirect('/');
            }
        } catch (Throwable $e) {
            dd($e->getMessage());
        }
    }
}
