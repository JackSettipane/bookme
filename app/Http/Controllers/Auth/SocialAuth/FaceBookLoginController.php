<?php
namespace App\Http\Controllers\Auth\SocialAuth;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Carbon\Carbon;
use App\SocialLoginAccount;
use Auth;
use Hash;
use Illuminate\Support\Str;

class FaceBookLoginController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try
        {
            $socialite = Socialite::driver('facebook')->stateless()->user();
            $password = rand(99999999999,99999999999);
           
            $create['first_name'] = $socialite->getName();
            $create['email'] = $socialite->getEmail();
            $create['password'] = Hash::make($password);
            $create['user_name'] = Str::slug($socialite->getName(), '-');
            $create['type'] = 'talent';

            if ( User::where('email', $create['email'])->first())
            {
              
                Auth::loginUsingId(User::where('email', $create['email'])->first()->id);

                return redirect()->route('home');
            }
            $userModel = User::create($create);
            $userModel->assignRole('talent');

            $socialLoginAccount = new SocialLoginAccount;
            $socialLoginAccount->provider = 'facebook';
            $socialLoginAccount->user_id = $userModel->id;
            $socialLoginAccount->provider_user_id = $socialite->getId();
            $socialLoginAccount->auth2_token = $socialite->token;
            $socialLoginAccount->auth2_refreshToken = $socialite->refreshToken;
            $socialLoginAccount->auth2_expiresIn = $socialite->expiresIn;
            $socialLoginAccount->auth1_token = $socialite->token;
            $socialLoginAccount->auth1_tokenSecret = isset($socialite->tokenSecret) ? $socialite->tokenSecret : '';
            $socialLoginAccount->save();
            (Auth::attempt(['email' => $socialite->getEmail() , 'password' => $password]));
            return redirect()->route('home');
        }
        catch(Exception $e)
        {
            return redirect('auth/facebook');
        }
    }


    
}

