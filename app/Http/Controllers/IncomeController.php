<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Employee;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Service;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
    //     $query_date = $request->prev_month;
    //     $date = new DateTime($query_date);
    //     //First day of month
    //     $date->modify('first day of this month');
    //     $firstday= $date->format('Y-m-d');
    //     //Last day of month
    //     $date->modify('last day of this month');
    //     $lastday= $date->format('Y-m-d');
   
    //     $arr= DB::table('service_repairs As sr')
    //     ->select('is_complete','sr.code','amount','paid_amount', 'charge','created_at')
    //     ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
    //     ->sum('sr.amount');
      
    // //dd($arr);
    //        return view('admin.income.index')->with($arr);


//         $recordes = ServiceRepair::with('user:id,fname,email')
//         ->with('customervehicle:register_number,id')
//         ->with('service:id,price,name')
//         ->with('employee:id,name')
//         ->with('stock')
//         ->latest()
//         ->get()
//         ->toArray();

// //dd($recordes);

// return view('admin.income.index',compact('recordes'));

   // $arr['servicerepair'] = ServiceRepair::all(); 

    $recordes = ServiceRepair::with('user:id,fname,email')
                  ->with('customervehicle:register_number,id')
                  ->with('service:id,price,name')
                  ->with('employee:id,name')
                  ->with('stock')
                  ->latest()
                  ->get()
                  ->toArray();
               //   dd($arr);
     return view('admin.income.index',compact('recordes'));

    
    }

    public function create()
    {
        $arr['servicerepair'] = ServiceRepair::all();
        $arr['employee'] = Employee::all();
        return view('admin.income.create')->with($arr);
    }

    public function upload_info(Request $request) 
    {

        $id = $request['prIdi'];
        $servicerepairId = ServiceRepair::findOrFail($id)->id;

        $query_date = $request->prev_month;
        $date = new DateTime($query_date);
        //First day of month
        $date->modify('first day of this month');
        $firstday= $date->format('Y-m-d');
        //Last day of month
        $date->modify('last day of this month');
        $lastday= $date->format('Y-m-d');

        $price = ServiceRepair::where('code',$id)
        ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
        ->sum('price');

        return response()->json(['price'=>$price]);
    }

    public function child_info(Request $request) 
    {
        $id = $request['prIdi'];
        $service = Service::findOrFail($id);
        $upload = $service->income->where('service_id',$id)->where('status',true)->pluck('price','id')->all();
        return response()->json($upload);
    }

    // public function upload_info(Request $request) 
    // {

    //     $id = $request['prIds'];
    //     $servicerepair = servicerepair::findOrFail($id);
    //     //$upload  = DB::table('attendances')->leftjoin('employees','employees.id','=','attendances.employee_id')->select('attendances.id','time_start')->where('employee_id',$employeeId)->get();
    //     $query_date = $request->prev_month;
    //     $date = new DateTime($query_date);
    //     //First day of month
    //     $date->modify('first day of this month');
    //     $firstday= $date->format('Y-m-d');
    //     //Last day of month
    //     $date->modify('last day of this month');
    //     $lastday= $date->format('Y-m-d');
    //     $upload = $servicerepair->service->where('code',$id)->pluck('id','id')->all();

    //     $servicerepair = servicerepair::where('service_id',$id)
    //     ->whereBetween('created_at', [$firstday." 00:00:00", $lastday." 23:59:59"])
    //     ->count('price');

    //     return response()->json(['service'=>$service]);
    // }

    // public function child_info(Request $request) 
    // {

    //     $id = $request['prId'];
    //     $service = Service::findOrFail($id);
    //     $upload = $service->income->where('price',$id)->where('status',true)
    //                             ->pluck('price','id')->all();

    //     return response()->json($upload);
    // }
}
