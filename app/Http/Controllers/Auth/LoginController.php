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

   // protected $redirectTo = '/home';



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    

     public function authenticated()
     {

       

       $gsetting = Setting::first();

        if(Auth::User()->status == 1)
        {
          //  if(Auth::user()->role->first()->name  == "manager")
          if(Auth::User()->role_id == "1")
            {
                return redirect()->route('admin.index');
            }
           // elseif(Auth::user()->role->first()->name  == "cashier")
           elseif(Auth::User()->role_id == "2")
            {
                return redirect()->route('admin.index');
            }
            else
            {
                return redirect('/');
            }
        }
        else
        {
            
            Auth::logout();
            return redirect()->route('login'); 
        }
     }
}
