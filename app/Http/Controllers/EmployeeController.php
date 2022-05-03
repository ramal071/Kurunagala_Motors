<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Employee;
use App\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['employee'] = Employee::all();
        return view('admin.employee.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        // $employee = Employee::all();
        return view('admin.employee.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        
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
return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $arr['employee'] =$employee;
        $arr['roles'] = Role::all(); 
        return view('admin.employee.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      
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

    //   $employee->role_id = $request->role_id;
    $employee->roles()->sync($request->roles);
       $employee->emp_image = $file;
       $employee->id_front = $file1;
       $employee->id_back = $file2;
       $employee->name = $request->name;
       $employee->nick_name = $request->nick_name;
       $employee->phone = $request->phone;
       $employee->address = $request->address;
       $employee->status = ($request->status) ? 1:0;
       $employee->save();

       return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.index');
    }
}
