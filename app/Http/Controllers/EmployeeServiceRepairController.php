<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeServiceRepairController extends Controller
{

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['employee'] = Employee::all();   

        return view('admin.employeeservice.index')->with($arr); 
    
    }

}
