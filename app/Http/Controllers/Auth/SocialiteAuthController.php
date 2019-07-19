<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SocialProfile;

class SocialiteAuthController extends Controller
{
    
    public function authenticate($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    public function socialiteCallback($provider)
    {
        try {
            $socialUserInfo = Socialite::driver($provider)->user();
            
            if (Auth::check()) {
                // The user is logged in. Probably we need to add this profile for him
                $this->assignSocialProfileToUser($socialUserInfo);
            }
            else{
                // It is guest.We neen register or login him
                $this->loginOrRegisterUserByProfile($socialUserInfo);
            }

            dd($socialUserInfo);            
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
