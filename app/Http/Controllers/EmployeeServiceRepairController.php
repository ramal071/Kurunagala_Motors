<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Employee;

class EmployeeServiceRepairController extends Controller
{

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['employee'] = Employee::all();   
        return view('admin.employeeservice.index')->with($arr);    
    }

    public function create()
    {
        //
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
