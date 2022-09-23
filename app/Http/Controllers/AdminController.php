<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::User()->role_id == "1")
        {                      
        $current_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count(); 
        $before_1_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count(); 
        $before_2_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count(); 
        $before_3_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count(); 
        $usersCount= array($current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users);
        return view('admin.dashboard')->with(compact('usersCount'));
        }
       elseif(Auth::User()->role_id == "2")
        {
            $current_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count(); 
            $before_1_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count(); 
            $before_2_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count(); 
            $before_3_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count(); 
            $usersCount= array($current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users);
            return view('admin.dashboard')->with(compact('usersCount'));
        }
        else
        {
            abort(404, 'Page Not Found.');
        }
        
    }
    
}
