<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Setting;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            // 'g-recaptcha-response' => 'required|captcha',
            'mobile' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'max:17'],
            // 'term' => 'required',
        ]);
       
      
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // $setting = Setting::first();
        // if($setting->verify_enable)
        // {
        //     $verified = Null;
        // }
        // else{
        //     $verified = \Carbon\Carbon::now()->toDateTimeString();
        // }

        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
           // 'email_verified_at' => $verified,
            'password' => Hash::make($data['password']),
            'notification_preference' => []
        ]);

        // if($setting->w_email_enable){
        //     try{
        //         Mail::to($data['email'])->send(new WelcomeUser($user)); 
        //     }
        //     catch(\Swift_TransportException $e){

        //     }
        // }
        

        return $user;
    }
}
