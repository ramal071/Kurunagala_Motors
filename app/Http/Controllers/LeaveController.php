<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
   
    public function index()
    {
        $arr['leaves'] = Leave::all();
        $arr['employee'] = Employee::all(); 
        return view('admin.leave.index')->with($arr);
    }

    public function create(Request $request)
    {
        $arr['employee'] = Employee::all();
        return view('admin.leave.create')->with($arr);
    }

    public function store(Request $request, Leave $leave)
    {
        $request->validate([
            'employee_id'=> 'required|not_in:0',
            'leave_type'   => 'required|string|max:255',
            'from_date'    => 'required|string|max:255',
            'to_date'      => 'required|string|max:255',
        ]);

        try {

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $days    = $day->d;

            $leaves = new Leave;
            $leaves->employee_id   = $request->employee_id;
            $leaves->leave_type    = $request->leave_type;
            $leaves->from_date     = $request->from_date;
            $leaves->to_date       = $request->to_date;
            $leaves->day           = $days;
            $leaves->leave_reason  = $request->leave_reason;
            $leaves->save();
            
            return redirect()->route('leave.index')->with('success','Created new leave successfully');

        } catch(\Exception $e) {
           
            return redirect()->back();
        }

    }

    public function edit(Leave $leave)
    {
        $arr['leave'] = $leave;
        $arr['employee'] = Employee::all();
        return view('admin.leave.edit')->with($arr);
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'from_date'    => 'required|string|max:255',
            'to_date'      => 'required|string|max:255',
        ]);

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $days    = $day->d;

            $leave->from_date    = $request->from_date;
            $leave->to_date      = $request->to_date;
            $leave->day          = $days;
            $leave->leave_reason = $request->leave_reason;
            $leave->save();
            return redirect()->route('leave.index')->with('success', 'leave Marked');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leave.index')->with('delete', 'Leave deleted');
    }
}
