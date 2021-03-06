<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Employee;
use App\Role;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{

    public function index()
    {
        $arr['employee'] = Employee::all();
        return view('admin.employee.index')->with($arr);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.employee.create', compact('roles'));
    }

    public function store(Request $request, Employee $employee)
    {
        $data = $this->validate($request, [
            'name'=>'required|string|min:1|max:255',
            'nick_name'=>'required|string|min:1|max:255',
            'emp_image'=>'required',
            'id_front'=>'required',
            'id_back'=>'required',
            'phone'=>'required|numeric',
            'address'=>'required|string|min:1|max:255',
            'basic_salary'=>'required|numeric',
            'half_salary'=>'required|numeric',
            'status'=>'required',
        ]);
        
         if($request->emp_image->getClientOriginalName()){
             $ext =  $request->emp_image->getClientOriginalExtension();
             $file = date('YmdHis').rand(1,99999).'.'.$ext;
             $request->emp_image->storeAs('public/employee/',$file);
        }
        else
        {
            $file = '';
        }

        if($request->id_front->getClientOriginalName()){
            $ext1 =  $request->id_front->getClientOriginalExtension();
            $file1 = date('YmdHis').rand(1,99999).'.'.$ext1;
            $request->id_front->storeAs('public/employee/',$file1);
       }
       else
       {
           $file1 = '';
       }

       if($request->id_back->getClientOriginalName()){
        $ext2 =  $request->id_back->getClientOriginalExtension();
        $file2 = date('YmdHis').rand(1,99999).'.'.$ext2;
        $request->id_back->storeAs('public/employee/',$file2);
   }
   else
   {
       $file2 = '';
   }     
    $employee->name = $request->name;
  
    $employee->nick_name = $request->nick_name;
      
    $employee->emp_image = $file;
    $employee->id_front = $file1;
    $employee->basic_salary = $request->basic_salary;
    $employee->half_salary = $request->half_salary;
    $employee->id_back = $file2;
    $employee->phone = $request->phone;
    $employee->address = $request->address;
    $employee->status = ($request->status) ? 1:0 ;

    $employee->save();

    $employee->roles()->attach($request->roles);        
    return redirect()->route('employee.index')->with('success', 'Employee created');
    }

    public function show(Employee $employee)
    {
        
    }
     
    public function edit(Employee $employee)
    {
        $arr['employee'] =$employee;
        $arr['roles'] = Role::all(); 
        
        $arr['empolyee_roles']  = DB::table('employee_role as er')
                ->leftjoin('employees as e','e.id','=','er.employee_id')
                ->leftjoin('roles as r','e.id','=','er.role_id')
                ->select('*')
                 ->where('er.employee_id' , $employee->id)
                ->get();
    // dd($arr['empolyee_roles']);
        return view('admin.employee.edit')->with($arr);
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $this->validate($request, [
            'name'=>'required|string|min:1|max:255',
            'nick_name'=>'required|string|min:1|max:255',
            'phone'=>'required|numeric',
            'basic_salary'=>'required|numeric',
            'half_salary'=>'required|numeric',
            'address'=>'required|string|min:1|max:255',
        ]);
      
        if(isset($request->emp_image) && $request->emp_image->getClientOriginalName()){
            $ext =  $request->emp_image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->emp_image->storeAs('public/employee/',$file);
       }
       else
       {
        if(!$employee->emp_image)
        $file = '';
         else
        $file = $employee->emp_image;
       }

       if(isset($request->id_front) && $request->id_front->getClientOriginalName()){
           $ext1 =  $request->id_front->getClientOriginalExtension();
           $file1 = date('YmdHis').rand(1,99999).'.'.$ext1;
           $request->id_front->storeAs('public/employee/',$file1);
      }
      else
      {
        if(!$employee->id_front)
        $file1 = '';
         else
        $file1 = $employee->id_front;
      }

      if(isset($request->id_back) && $request->id_back->getClientOriginalName()){
       $ext2 =  $request->id_back->getClientOriginalExtension();
       $file2 = date('YmdHis').rand(1,99999).'.'.$ext2;
       $request->id_back->storeAs('public/employee/',$file2);
    }
    else
    {
      if(!$employee->id_back)
          $file2 = '';
       else
      $file2 = $employee->id_back;
     }
    
       $employee->emp_image = $file;
       $employee->id_front = $file1;
       $employee->id_back = $file2;
       $employee->basic_salary = $request->basic_salary;
       $employee->half_salary = $request->half_salary;
       $employee->name = $request->name;
       $employee->nick_name = $request->nick_name;
       $employee->phone = $request->phone;
       $employee->address = $request->address;
       $employee->status = ($request->status) ? 1:0;
       $employee->save();
       $employee->roles()->sync($request->roles);
       $employee->save();
       return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.index')->with('delete','Employee deleted');
    }
}
