<?php

namespace App\Http\Controllers;

use App\ServiceRepair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;
use App\Stock;
use App\CustomerVehicle;
use App\Service;
use App\Employee;


class ServiceRepairController extends Controller
{

    // public function usedProductService(Request $request, ServiceRepair $servicerepair)
    // {
    //     $arr['product'] = Product::all();
    //     $arr['servicerepair'] = ServiceRepair::all();
    //     return view('admin.servicerepair.usedProductService')->with($arr);
    // }

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();
        return view('admin.servicerepair.index')->with($arr);
    }

    public function create()
    {
        $arr['service'] = Service::all();
        $arr['stock'] = Stock::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
        $arr['employee'] = Employee::all();
        $arr['product'] = Product::all();
        return view('admin.servicerepair.create')->with($arr);
    }

    public function store(Request $request, ServiceRepair $servicerepair)
    {
       
        $servicerepair->user_id = $request->user_id;
        $servicerepair->stock_id = $request->stock_id;
        $servicerepair->customervehicle_id = $request->customervehicle_id;
        $servicerepair->service_id = $request->service_id;
        $servicerepair->product_id = $request->product_id;
       // $servicerepair->employee()->attach($request->employee);   
        $servicerepair->amount = $request->amount;
        $servicerepair->paid_amount = $request->paid_amount;
        $servicerepair->status = ($request->status) ? 1:0 ;
        $servicerepair->is_repaircomplete = ($request->is_repaircomplete) ? 1:0 ;
        $servicerepair->is_borrow = ($request->is_borrow) ? 1:0 ;
        $servicerepair->is_complete = ($request->is_complete) ? 1:0 ;
        $servicerepair->save();
        $servicerepair->employee()->attach($request->employee);   
        return redirect()->route('servicerepair.index')->with('success', 'Created successfully');
    }

    public function show(ServiceRepair $servicerepair)
    {
        //
    }

    public function edit(Request $request, ServiceRepair $servicerepair)
    {
        $arr['servicerepair'] = $servicerepair;
        $arr['service'] = Service::all();
        $arr['stock'] = Stock::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
        $arr['employee'] = Employee::all();
        $arr['product'] = Product::all();

        // $arr['empolyee_service_repairs']  = DB::table('employee_service_repairs as esr')
        // ->leftjoin('service_repairs as sr','sr.id','=','esr.service_repair_id')
        //         ->leftjoin('employees as e','e.id','=','esr.employee_id')               
        //         ->select('*')
        //          ->where('esr.service_repair_id' , $servicerepair->id)
        //         ->get();

        return view('admin.servicerepair.edit')->with($arr);
    }

    public function update(Request $request, ServiceRepair $servicerepair)
    {
        $servicerepair->user_id = $request->user_id;
        $servicerepair->stock_id = $request->stock_id;
        $servicerepair->customervehicle_id = $request->customervehicle_id;
        $servicerepair->service_id = $request->service_id;
        $servicerepair->product_id = $request->product_id; 
        $servicerepair->amount = $request->amount;
        $servicerepair->paid_amount = $request->paid_amount;
        $servicerepair->status = ($request->status) ? 1:0 ;
        $servicerepair->is_repaircomplete = ($request->is_repaircomplete) ? 1:0 ;
        $servicerepair->is_borrow = ($request->is_borrow) ? 1:0 ;
        $servicerepair->is_complete = ($request->is_complete) ? 1:0 ;
        $servicerepair->employee()->sync($request->employee);   
        $servicerepair->save();
      
        return redirect()->route('servicerepair.index');
    }

    public function destroy($id)
    {
        ServiceRepair::destroy($id);
        return redirect()->route('servicerepair.index')->with('delete', 'Job deleted');
    }
}
