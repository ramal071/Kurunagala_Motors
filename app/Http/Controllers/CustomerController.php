<?php

namespace App\Http\Controllers;

use App\Customer;
use App\customervehicle;
use Illuminate\Http\Request;
use App\customerpendingservice;

use App\User;
use Auth;
use Redirect;

class CustomerController extends Controller
{
    public function customerVehiclePage($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $customervehicle =  customervehicle::where('user_id', $user->id)->orderBy('id', 'desc')->get();
         //   $customervehicle = customervehicle::select('id','register_number')->get(Auth::User()->id);       
            return view('customer.index',compact('user', 'customervehicle'));
        }
        return Redirect::route('login');
    }

    public function PendingService($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $customerpendingservice =  customerpendingservice::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            return view('customer.pendingservice',compact('user',  'customerpendingservice'));
        }
        return Redirect::route('login');
    }

}
