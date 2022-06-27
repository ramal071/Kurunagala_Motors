<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceReportController extends Controller
{

    public function index()
    {
        // $data=Attendance::select('id', 'created_at')->get()->groupBy(function($data){
        //     return Carbon::parse($data->created_at)->format('M');
        // });
        // $months=[];
        // $monthCount=[];

        // foreach ($data as $month => $values) {
        //     $months[]=$month;
        //     $monthCount[] = count($values);
        // }

        // return view('admin.attendance.report', ['data'=>$data, 'months'=>$months, 'monthCount'=>$monthCount]);

        // $users = User::select(DB::raw("COUNT(*) as count"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->pluck('count');

        // $months = User::select(DB::raw("Month(created_at) as month"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->pluck('month');

        // $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        // foreach ($months as $index => $month) {
        //     $datas[$month] = $users[$index];
        // }
        
        // return view('admin.attendance.report', compact('datas'));

        $current_month_users = Attendance::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count(); 
        $before_1_month_users = Attendance::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count(); 
        $before_2_month_users = Attendance::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count(); 
        $before_3_month_users = Attendance::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count(); 
        $usersCount= array($current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users);
        return view('admin.attendance.report')->with(compact('usersCount'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
