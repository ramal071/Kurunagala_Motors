<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Employee;
use App\Role;

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
        // $employee = Employee::all();
        return view('admin.employee.create', compact('roles'));
    }

    public function store(Request $request, Employee $employee)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'nick_name'=>'required',
            'emp_image'=>'required',
            'id_front'=>'required',
            'id_back'=>'required',
            'phone'=>'required',
            'address'=>'required',
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
        return view('admin.employee.edit')->with($arr);
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'nick_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
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
       $employee->name = $request->name;
       $employee->nick_name = $request->nick_name;
       $employee->phone = $request->phone;
       $employee->address = $request->address;
       $employee->status = ($request->status) ? 1:0;
       $employee->save();
       $employee->roles()->sync($request->roles);
       return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.index')->with('delete','Employee deleted');
    }
}
