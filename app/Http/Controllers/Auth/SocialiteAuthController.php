<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SocialProfile;
use Socialite;

class SocialiteAuthController extends Controller
{
    
    public function authenticate($provider)
    {
        //dd('before redirect to '.$provider);
        return Socialite::driver($provider)->redirect();
    }
 
    public function socialiteCallback($provider)
    {
        // dd('in callback',request()->all());
        try {
            $socialUserInfo = Socialite::driver($provider)->user();
            //dd($socialUserInfo);
            if (Auth::check()) {
                // The user is logged in. Probably we need to add this profile for him
                $this->assignSocialProfileToUser($socialUserInfo);
            }
            else{
                // It is guest.We neen register or login him
                $this->loginOrRegisterUserByProfile($socialUserInfo);
            }

            
        } catch (Exception $e) {
            throw new SocialAuthException("failed to authenticate with $provider");
        }
    }

    private function loginOrRegisterUserByProfile(SocialProfile $profile)
    {
        // Todo : add create\register logic

        // external example : 
        // $user = User::firstOrCreate(['email' => $socialUserInfo->getEmail()]);
 
        // $socialProfile = $user->socialProfile ?: new SocialLoginProfile;
        // $providerField = "{$provider}_id";
        // $socialProfile->{$providerField} = $socialUserInfo->getId();
        // $user->socialProfile()->save($socialProfile);

        // auth()->login($user);
 
    }

    private function assignSocialProfileToUser(SocialProfile $profile)
    {
        // Todo
    }
}
