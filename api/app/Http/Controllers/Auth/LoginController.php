<?php

namespace tutuorfinder\Http\Controllers\Auth;

//use Composer\DependencyResolver\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use tutuorfinder\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use tutuorfinder\Models\xy_role;
use tutuorfinder\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])) {
            // return redirect()->intended('dashboard');//save session for role_id
            $dbuser=User::where('email','=',$request->email)->first()->toArray();//set role_id in a session
            //$dbRole=xy_role::find($dbuser['role_id'])->first()->toArray();
            //$request->session()->forget('roles');
            //$request->session()->push('roles', $dbRole);
            $this->incrementLoginAttempts($request);
        }  else {
            $this->incrementLoginAttempts($request);
        }


        $usermodel=User::where('email','=',$request->email)->where('is_active','=',0)->first();
        if($usermodel){
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.inactive')],
            ]);
        }


        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);

    }


}
