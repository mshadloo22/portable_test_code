<?php

namespace tutuorfinder\Http\Controllers;

use Illuminate\Http\Request;
use tutuorfinder\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthFacebookController extends Controller
{
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback() {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $existUser = User::where('email',$facebookUser->email)->first();
            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $expire_date = date('Y-m-d H:i:s');
                $user = new User;
                $user->name = $facebookUser->name;
                $user->role = 'student';
                $user->email = $facebookUser->email;
                $user->password = md5(rand(1,10000));
                $user->login_type = 'facebook';
                $user->expire = $expire_date;
                $user->is_active = '1';
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } 
        catch (Exception $e) {
            return 'error';
        }
    }
}
