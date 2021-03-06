<?php

namespace App\Http\Controllers;

use App\CustomerPendingService;
use Illuminate\Http\Request;
use App\CustomerVehicle;
use App\Service;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CustomerPendingServiceController extends Controller
{

    public function index()
    {
        $arr['customerpendingservice'] = CustomerPendingService::all();
       
        if(Gate::allows('isManager')){
            return view('admin.customerpendingservice.index')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.customerpendingservice.index')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function create()
    {
        $arr['service'] = Service::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
      
        if(Gate::allows('isManager')){
            return view('admin.customerpendingservice.create')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.customerpendingservice.create')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request, CustomerPendingService $customerpendingservice)
    {
        $customerpendingservice->user_id = $request->user_id;
        $customerpendingservice->customervehicle_id = $request->customervehicle_id;
        $customerpendingservice->service_id = $request->service_id;
        $customerpendingservice->next_date = $request->next_date;
        $customerpendingservice->email = $request->email;
        $customerpendingservice->reminder_date = $request->reminder_date;
        // $customerpendingservice->reminder_date = ($request->status) ? 1:0;
        $customerpendingservice->description = $request->description;
        $customerpendingservice->save();
        return redirect()->route('customerpendingservice.index')->with('success', 'Created successfully');
    }

    public function show(CustomerPendingService $customerpendingservice)
    {
        
    }

    public function edit(Request $request, CustomerPendingService $customerpendingservice)
    {
        $arr['customerpendingservice'] = $customerpendingservice;
        $arr['service'] = Service::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();

        if(Gate::allows('isManager')){
            return view('admin.customerpendingservice.edit')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.customerpendingservice.edit')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, CustomerPendingService $customerpendingservice)
    {
        $customerpendingservice->user_id = $request->user_id;
        $customerpendingservice->customervehicle_id = $request->customervehicle_id;
        $customerpendingservice->service_id = $request->service_id;
        $customerpendingservice->next_date = $request->next_date;
        $customerpendingservice->email = $request->email;
        $customerpendingservice->reminder_date = $request->reminder_date;
        // $customerpendingservice->reminder_date = ($request->status) ? 1:0;
        $customerpendingservice->description = $request->description;
        $customerpendingservice->save();
        return redirect()->route('customerpendingservice.index')->with('success', 'Created successfully');
    }

    public function destroy($id)
    {
        CustomerPendingService::destroy($id);

        if(Gate::allows('isManager')){
            return redirect()->route('customerpendingservice.index')->with('delete', 'customer pending service deleted');
        }
        if(Gate::allows('isCashier')){
            return redirect()->route('customerpendingservice.index')->with('delete', 'customer pending service deleted');
        }
        else{
            abort(403);
        }
    }

    public function upload_info(Request $request) 
    {

        $id = $request['prId1'];
        $userId = User::findOrFail($id)->id;
        $upload  = DB::table('customer_vehicles')->leftjoin('users','users.id','=','customer_vehicles.user_id')->select('customer_vehicles.id','register_number')->where('user_id',$userId)->get();
    //    $user = User::findOrFail($id)->id;  
    //    $upload = $user->customervehicle->where('user_id',$id)->pluck('user_id',$user)->all();
        // dd($userId);
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
