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

        // $arr= DB::table('service_repairs As sr')
        // ->leftJoin('employees AS em', 'sr.employee_id', '=', 'em.id')
        // ->leftJoin('customer_vehicles AS cv', 'sr.customervehicle_id', '=', 'cv.id')
        // ->leftJoin('services AS s', 'sr.service_id', 's.id')
        // ->select('em.id', 'sr.code', 'is_repaircomplete', 'is_complete','em.name', 'nick_name','customervehicle_id', 'charge','s.name', 'register_number')
        // ->groupBy('sr.id')     
        // ->get()
        // ->dd($arr);

   
        // return view('admin.employeeservice.index', ['arr' => $arr]);
    
     return view('admin.employeeservice.index')->with($arr); 
    
    }

}
