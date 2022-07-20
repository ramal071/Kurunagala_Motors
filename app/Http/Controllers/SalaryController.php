<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Attendance;
use App\Employee;
use App\Leave;
use App\ServiceRepair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use DateTime;
use App\Allowance;
use App\Loan;

class SalaryController extends Controller
{
    public function index()
    {
        $arr['employee'] = Employee::all(); 
        
        $recordes = Salary::with('employee:id,name,basic_salary,half_salary')
                     ->with('servicerepair:id,employee_id,charge')
                    ->latest()
                    ->get()
                    ->toArray();
               //     dd($recordes);
        return view('admin.salary.index',compact('recordes'))->with($arr);
    }

    public function create()
    {
        $arr['employee'] = Employee::all();

        return view('admin.salary.create')->with($arr);

      
    }

    public function store(Request $request, Salary $salary)
    {
        $data = $this->validate($request, [ 
            'employee_id'=> 'required|string|max:255',
        ],
            [
            'employee_id.required'=>'Please enter the employee id !!!',
            ]
        );

        $slip_id = Helper::InvGenerator(new Salary, 'slip_id',5,'Inv');
        $salary->slip_id=$slip_id; 
        $salary->employee_id = $request->employee_id;
        $salary->worked_days = $request->workdays;
        $salary->full_leave = $request->full_leave;  
        $salary->half_days = $request->half_days;  
        $salary->job_amount = $request->job_amount;
        $salary->allowance = $request->allowance;
        $salary->loan_amount = $request->loan_amount;
        $salary->total_salary = $request->total_salary;
        $salary->save();
        return redirect()->route('salary.index')->with('success', 'salary Marked');
    }

    // public function show($id)
    // {
    //       $salary = DB::table('employees')
    //                 ->join('salaries', 'employees.id', '=', 'salaries.employee_id')
    //                 ->join('service_repairs', 'employees.id', '=', 'service_repairs.employee_id')
    //                 ->select('employees.*', 'salaries.*', 'service_repairs.*')
    //                 ->get(); 

    //               //  return dd($employee);

    //     return view('admin.salary.show',compact('salary'));
   
    // }

    public function show(Salary $salary)
    {
        return view('admin.salary.show',['salary'=>$salary]);
    }

    public function edit(Salary $salary)
    {
        $arr['salary'] = $salary;
        $arr['employee'] = Employee::all(); 
        return view('admin.salary.edit')->with($arr);
    }

    public function update(Request $request, Salary $salary)
    {
        // $data = $this->validate($request, [ 
        //     'employee_id'=> 'required',
        // ],

        // );

        // $salary->employee_id = $request->employee_id;
        // $salary->worked_days = $request->workdays;
        // $salary->full_leave = $request->full_leave;  
        // $salary->half_days = $request->half_days;  
        // $salary->job_amount = $request->job_amount;
        // $salary->allowance = $request->allowance;
        // $salary->loan_amount = $request->loan_amount;
        // $salary->total_salary = $request->total_salary;
        // $salary->save();
        // return redirect()->route('salary.index')->with('success', 'salary Marked');

    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index')->with('delete', 'salary deleted');

    }

    public function upload_info(Request $request) 
    {

        $id = $request['prIds'];
        $employeeId = Employee::findOrFail($id)->id;
        //$upload  = DB::table('attendances')->leftjoin('employees','employees.id','=','attendances.employee_id')->select('attendances.id','time_start')->where('employee_id',$employeeId)->get();
        $query_date = $request->prev_month;
        $date = new DateTime($query_date);
        //First day of month
        $date->modify('first day of this month');
        $firstday= $date->format('Y-m-d');
        //Last day of month
        $date->modify('last day of this month');
        $lastday= $date->format('Y-m-d');
        $attendance = Attendance::where('employee_id',$id)
                                ->whereBetween('time_start', [$firstday." 00:00:00", $lastday." 23:59:59"])
                                ->count('employee_id');
        $halfday = Leave::where('employee_id',$id)
                        ->where('leave_type','half day')
                        ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
                        ->count('employee_id');

        $fulleave = Leave::where('employee_id',$id)
                        ->where('leave_type','full leave')
                        ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
                        ->count('employee_id');

        $loan = Loan::where('employee_id',$id)
                    ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
                    ->sum('loan_amount');

        $allowance = Allowance::where('employee_id',$id)
                                ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
                                ->sum('allowance');

        $employee = Employee::where('id',$id)->first();
        $salary = Salary::where('id',$id)->first();

        $halfday_reduce =0;
        $halfday_allows = 1;
        if($halfday>=$halfday_allows){
            $halfday_reduce = 0.5*($halfday-$halfday_allows);
        }

        $days = $attendance - $halfday_reduce -$fulleave;
        $days = ($days<0)? 0:$days;

          //jobs
        $jobs = ServiceRepair::where('employee_id',$id)
                                ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
                                ->sum('charge');
        //return $jobs;
        
        //  25+ days for full payment
        $basic_salery = 0;
        if($days >=25){
            $basic_salery = $employee->basic_salary+$jobs+$allowance-$loan;
        }
        else{
            $basic_salery = $employee->half_salary+$jobs+$allowance-$loan;
        }
        

        return response()->json(['days'=>$days,'basic'=>$basic_salery,'halfday'=>$halfday,'full_leave'=>$fulleave,'job_amount'=>$jobs, 'loan_amount'=>$loan, 'allowance'=>$allowance]);
    }

    public function child_info(Request $request) 
    {
        $id = $request['prIds'];
        $attendance = Attendance::findOrFail($id);
        $upload = $attendance->salary->where('attendance_id',$id)->where('status',true)->pluck('name','id')->all();
        $count = SUM($upload);
        return response()->json($count);
    }


}
