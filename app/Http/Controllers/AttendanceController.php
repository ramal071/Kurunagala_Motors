<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use App\employee;

class AttendanceController extends Controller
{
    public function index()
    {
         $arr['attendance'] = Attendance::all();
        return view('admin.attendance.index')->with($arr);
    }

    public function create()
    {
        $arr['employee'] = Employee::all();
        return view('admin.attendance.create')->with($arr);
    }

    public function store(Request $request, Attendance $attendance)
    {
        $attendance->employee_id = $request->employee_id;
        $attendance->time_start = $request->time_start;
        $attendance->time_end = $request->time_end;
        $attendance->save();
        return redirect()->route('attendance.index')->with('success', 'Marked');
    }

    public function show(Attendance $attendance) 
    {
        return view('admin.attendance.show',['attendance'=>$attendance]);
    }

    public function edit(Attendance $attendance)
    {
        $arr['employee'] = employee::all();
        $arr['attendance'] = $attendance;
        return view('admin.attendance.edit')->with($arr);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->employee_id = $request->employee_id;
        $attendance->time_start = $request->time_start;
        $attendance->time_end = $request->time_end;
        $attendance->save();
        return redirect()->route('attendance.index');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('delete', 'Attendance deleted');
    }
}
