<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Employee;
use DB;

class EmployeeServiceRepairController extends Controller
{

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['employee'] = Employee::all();   
       
    if(request()->ajax())
     {
      if(!empty($request->from_date))
      {
       $data = DB::table('service_repairs')
         ->whereBetween('started_at', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('service_repairs')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('admin.employeeservice.index')->with($arr); 
    
    }

    public function create()
    {
        //  return view('admin.employeeservice.index')->with($arr); 
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, ServiceRepair $servicerepair)
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
