<?php

namespace tutuorfinder\Http\Controllers;

use Illuminate\Http\Request;
use tutuorfinder\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $expire_date = date('Y-m-d H:i:s');
                $user = new User;
                $user->name = $googleUser->name;
                $user->role = 'student';
                $user->email = $googleUser->email;
                $user->password = md5(rand(1,10000));
                $user->login_type = 'google';
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
