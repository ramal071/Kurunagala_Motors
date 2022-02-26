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
        if(Auth::User()->role == "admin")
        {        

            
            // $admin = User::where('role', '=', 'admin')->count();
            // $instructor = User::where('role', '=', 'cashier')->count();
            // $user = User::where('role', '=', 'user')->count();

            // $data = [$admin, $instructor, $user];


                     

            return view('admin.dashboard');
        }
        elseif(Auth::User()->role == "cashier")
        {

            return view('cashier.dashboard');
        }
        else
        {
            abort(404, 'Page Not Found.');
        }
        
    }
    
}
