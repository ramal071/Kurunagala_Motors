<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class SalaryController extends Controller
{
    public function index()
    {

        $arr['salary'] = Salary::all();
        $arr['employee'] = Employee::all(); 
    	 return view('admin.salary.index')->with($arr);

        // $employee = DB::table('employees')
        //             ->join('staff_salaries', 'employees.id', '=', 'staff_salaries.employee_id')
        //             ->select('employees.*', 'staff_salaries.*')
        //             ->get(); 
        // $employeeList = DB::table('employees')->get();
        // return view('admin.salary.index',compact('employee','employeeList'))->with($arr);

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
            'salary'=> 'required|string|max:255',
            'basic'=> 'required|string|max:255',
            'conveyance'=> 'required|string|max:255',
         //   'allowance'=> 'required|string|max:255',
            'medical_allowance'=> 'required|string|max:255',
            'leave'=> 'required|string|max:255',
         //   'labour_welfare'=> 'required|string|max:255',
        ],
            [
            'employee_id.required'=>'Please enter the employee id !!!',
            ]
        );

        $slip_id = Helper::InvGenerator(new Salary, 'slip_id',5,'Inv');
        $salary->slip_id=$slip_id; 

        $salary->employee_id = $request->employee_id;
        $salary->salary = $request->salary;
        $salary->basic = $request->basic;
        $salary->conveyance = $request->conveyance;
        $salary->allowance = $request->basic*2;
        $salary->medical_allowance = $request->medical_allowance;
        $salary->leave = ($request->leave)*1500;
        $salary->labour_welfare = $request->basic*0.18;
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
        $data = $this->validate($request, [ 
            'employee_id'=> 'required',
        ],
            [
            'employee_id.required'=>'Please enter the salary!!!',
            ]
        );

        $salary->employee_id = $request->employee_id;
        $salary->salary = $request->salary;
        $salary->basic = $request->basic;
        $salary->conveyance = $request->conveyance;
        $salary->allowance = $request->allowance;
        $salary->medical_allowance = $request->medical_allowance;
        $salary->leave = $request->leave;
        $salary->labour_welfare = $request->labour_welfare;
        $salary->save();
        return redirect()->route('salary.index')->with('success', 'salary Marked');

    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index')->with('delete', 'salary deleted');

    }
}
