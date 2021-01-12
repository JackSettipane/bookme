<?php

namespace App\Http\Controllers\Auth\SocialAuth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Carbon\Carbon;
use App\SocialLoginAccount;
use Auth;
use Hash;

class TwitterLoginController extends Controller
{
   



   public function redirectToTwitter()
   {
       return Socialite::driver('twitter')->redirect();
   }


    public function handleTwitterCallback()
    {
       
        try {
            $user = Socialite::driver('twitter')->stateless()->user();
          
            $password = 'malikmalik';
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['password'] = Hash::make( $password);

            User::first()->delete();
            SocialLoginAccount::first()->delete();
            $userModel =  User::create($create);

            $socialLoginAccount = new SocialLoginAccount;

            $socialLoginAccount->provider='twitter';
            $socialLoginAccount->user_id=$userModel->id;
            $socialLoginAccount->provider_user_id=$user->getId();
            $socialLoginAccount->auth2_token=$user->token;
            $socialLoginAccount->auth2_refreshToken=$user->refreshToken;
            $socialLoginAccount->auth2_expiresIn=$user->expiresIn;
            $socialLoginAccount->auth1_token=$user->token;
            $socialLoginAccount->auth1_tokenSecret=isset($user->tokenSecret)?$user->tokenSecret:'';
            $socialLoginAccount->save();
             
          

           (Auth::attempt(['email' =>$user->getEmail(), 'password' => $password]));

          

           return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
    
    
}
