<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Setting;
use Auth;
use App\User;

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

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        $gsetting = Setting::first();

        if(Auth::User()->status == 1)
        {
            if( Auth::User()-> role == "admin")
            {
                return redirect()->route('admin.index');
            }
            elseif(Auth::User()->role == "cashier")
            {
                return redirect()->route('cashier.index');
            }
            else
            {
                return redirect('/home');
            }
        }
        else{
            
            Auth::logout();
            return redirect()->route('login')->with('delete','You are deactivated !'); 
        }
    }
}
