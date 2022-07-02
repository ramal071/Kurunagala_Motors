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
use App\Helpers\Helper;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SerRepair;

class ServiceRepairController extends Controller
{
    public function index()
    {
        // $arr['servicerepair'] = ServiceRepair::all();
        $arr['servicerepair'] = ServiceRepair::all();

        // $arr['servicerepair'] =  DB::table('service_service_repairs AS sr')::leftJoin('service_repairs AS t', 't.id', '=', 'sr.service_repair_id')
        //                         ->leftJoin('services AS s', 's.id', '=', 'sr.service_id')
        //                         ->leftJoin('stock_service_repairs AS st', 'st.id', '=', 'sr.service_id')
        //                         ->select('shortDesc',  DB::raw('SUM(t.debit-t.credit) as bal'))
        //                         ->groupBy('shortDesc')
        //                         ->whereBetween('asAt', [$start, $end])
        //                         ->where(['accounts.subAccount' => $id])
        //                         ->get();
    //     $total['servicerepair'] = DB::table('service_repairs')->get();
    //     $total = $arr['servicerepair'] = DB::table('service_service_repairs')
    //     ->join('services', 'service_service_repairs.service_id', '=', 'services.id')
    //     ->where('service_service_repairs.service_repair_id')
    //     ->select('services.*', 'service_service_repairs.id as service_service_repair_id')
    //    // ->get();
    //    ->sum('services.price');

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

        $code = Helper::IDGenerator(new ServiceRepair, 'code',5,'Job');
        $servicerepair->code=$code; 

        $servicerepair->user_id = $request->user_id;
        $servicerepair->customervehicle_id = $request->customervehicle_id; 
        $servicerepair->amount = $request->amount;
        $servicerepair->email = $request->email;
        $servicerepair->paid_amount = $request->paid_amount;
        $servicerepair->status = ($request->status) ? 1:0 ;
        $servicerepair->is_repaircomplete = ($request->is_repaircomplete) ? 1:0 ;
        $servicerepair->is_borrow = ($request->is_borrow) ? 1:0 ;
        $servicerepair->is_complete = ($request->is_complete) ? 1:0 ;
        $servicerepair->save();
        $servicerepair->employee()->attach($request->employee);   
        $servicerepair->stock()->attach($request->stock);   
        $servicerepair->service()->attach($request->service);   

        // send job start mail
        $user_email=$request->email;
        Mail::to($user_email)->send(new SerRepair($servicerepair));

        //  stock reduce 
      $servicerepair == ServiceRepair::where('code',  $servicerepair->stock_id)->first();
      //  dd($servicerepair);
      echo "original stock:".$servicerepair->stock_id;

        return redirect()->route('servicerepair.index')->with('success', 'Created successfully');
    }

    public function show(Request $request, ServiceRepair $servicerepair)
    {
        
        $arr['servicerepair'] = $servicerepair;
        $arr['service'] = Service::all();
        $arr['stock'] = Stock::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
        $arr['employee'] = Employee::all();
        $arr['product'] = Product::all();

        return view('admin.servicerepair.show')->with($arr);
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
        $servicerepair->customervehicle_id = $request->customervehicle_id;
        $servicerepair->amount = $request->amount;
        $servicerepair->email = $request->email;
        $servicerepair->paid_amount = $request->paid_amount;
        $servicerepair->status = ($request->status) ? 1:0 ;
        $servicerepair->is_repaircomplete = ($request->is_repaircomplete) ? 1:0 ;
        $servicerepair->is_borrow = ($request->is_borrow) ? 1:0 ;
        $servicerepair->is_complete = ($request->is_complete) ? 1:0 ;
        $servicerepair->employee()->sync($request->employee); 
        $servicerepair->stock()->sync($request->stock); 
        $servicerepair->service()->sync($request->service);   
        $servicerepair->save();

        $user_email=$request->email;
        Mail::to($user_email)->send(new Registerd($servicerepair));
      
        return redirect()->route('servicerepair.index');
    }

    public function destroy($id)
    {
        ServiceRepair::destroy($id);
        return redirect()->route('servicerepair.index')->with('delete', 'Job deleted');
    }

    public function upload_info(Request $request) 
    {

        $id = $request['prId1'];
        $userId = User::findOrFail($id)->id;
        $upload  = DB::table('customer_vehicles')->leftjoin('users','users.id','=','customer_vehicles.user_id')->select('customer_vehicles.id','register_number')->where('user_id',$userId)->get();
        return response()->json($upload);
    }

    public function child_info(Request $request) 
    {
        $id = $request['prId1'];
        $customervehicle = CustomerVehicle::findOrFail($id);
        $upload = $customervehicle->customerpendingservice->where('customervehicle_id',$id)->where('status',true)->pluck('name','id')->all();
        return response()->json($upload);
    }


}
