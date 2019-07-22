<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                return $this->assignSocialProfileToUser($socialUserInfo,$provider);
            }
            else{
                // It is guest.We neen register or login him
                return $this->loginOrRegisterUserByProfile($socialUserInfo,$provider);
            }

            
        } catch (Exception $e) {
            throw new SocialAuthException("failed to authenticate with $provider");
        }
    }

    private function loginOrRegisterUserByProfile($socialUserInfo,$provider)
    {
        
        $userProfile = SocialProfile::firstOrNew([
            'email' => $socialUserInfo->getEmail(),
            'name' => $socialUserInfo->getName()?:$socialUserInfo->getNickname(),
            'provider' => $provider,
            'provider_id' => $socialUserInfo->getId(),
        ]);
        
        if ($userProfile->exists) {
            // userProfile already exists - login him
            $user = $userProfile->user;
            Auth::login($user);
        } else {
            // userProfile created from 'new'; does not exist in database.
            // 1. Create new user
            $newUser = User::create([
                'name' => $userProfile->name ,
                'email' => strtolower($userProfile->email),
                'password' => Hash::make(substr(md5(rand()), 0, 8))
            ]);
            // 2. Create profile
            $userProfile->user_id = $newUser->id;
            $userProfile->save();
            // 3. Assign profile to user
            // 4. login user
            Auth::login($newUser);
            
        }
        return redirect('home'); 
    }

    private function assignSocialProfileToUser($socialUserInfo,$provider)
    {
        // Todo
        $userProfile = SocialProfile::firstOrNew([
            'user_id' => Auth::user()->id,
            'email' => $socialUserInfo->getEmail(),
            'name' => $socialUserInfo->getName()?:$socialUserInfo->getNickname(),
            'provider' => $provider,
            'provider_id' => $socialUserInfo->getId(),
        ]);

        if ($userProfile->exists) {
            $message = "$provider account alredy exists in your profile";
        }
        else{
            $userProfile->save();
            $message = "$provider account added to your profile";
        }
            
        return redirect('home')->with('status',$message); 
    }
}
