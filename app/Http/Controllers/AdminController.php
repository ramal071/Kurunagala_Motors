<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
      //  return view('admin.dashboard');
      //  if(Auth::user()->role->first()->name  == "manager")
        if(Auth::User()->role_id == "1")
        {                         

            return view('admin.dashboard');
        }
       // elseif(Auth::user()->role->first()->name  == "cashier")
       elseif(Auth::User()->role_id == "2")
        {
            return view('admin.dashboard');
        }
        else
        {
            abort(404, 'Page Not Found.');
        }
        
    }
    
}
