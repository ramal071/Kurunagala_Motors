<?php

namespace App\Http\Controllers;

use App\CustomerVehicle;
use Illuminate\Http\Request;
use App\Bike;
use App\brand;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registerd;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CustomerVehicleController extends Controller
{
    public function index()
    {
        $arr['customervehicle'] = CustomerVehicle::all();

        if(Gate::allows('isManager')){
            return view('admin.customervehicle.index')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.customervehicle.index')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function create()
    {
        $arr['user'] = User::all();
        $arr['bike'] = Bike::all();
        $arr['brand'] = brand::all();

        if(Gate::allows('isManager')){
            return view('admin.customervehicle.create')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.customervehicle.create')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request, CustomerVehicle $customervehicle)
    {

        $data = $this->validate($request, [ 
            'bike_id'=> 'required',
            'brand_id'=>'required',
            'user_id'=> 'required',
            'register_number'=>'required|unique:customer_vehicles,register_number',
        ]);

        $customervehicle->user_id = $request->user_id;
        $customervehicle->bike_id = $request->bike_id;
        $customervehicle->brand_id = $request->brand_id;
        $customervehicle->register_number = $request->register_number;

        $customervehicle->save();

        // Mail::send('admin.emails.customerVehicleCreated', $customervehicle->toArray(),
        // function($message){
        //     $message
        //     ->to('testramal071@gmail.com', 'Code Online')
        //     ->subject('Your bike registered');
        // });  Auth::user()->email;
        return redirect()->route('customervehicle.index')->with('success', 'Created successfully');
    }

    public function show(CustomerVehicle $customervehicle)
    {
        //
    }

    public function edit(CustomerVehicle $customervehicle)
    {
        $arr['customervehicle'] = $customervehicle;
        $arr['bike'] = Bike::all();
        $arr['brand'] = brand::all();
        $arr['user'] = User::all();

        if(Gate::allows('isManager')){
            return view('admin.customervehicle.edit')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.customervehicle.edit')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, CustomerVehicle $customervehicle)
    {
        $customervehicle->user_id = $request->user_id;
        $customervehicle->bike_id = $request->bike_id;
        $customervehicle->brand_id = $request->brand_id;
        $customervehicle->register_number = $request->register_number;
        $customervehicle->save();
        return redirect()->route('customervehicle.index');
    }

    public function destroy($id)
    {
        customerVehicle::destroy($id);
        
        if(Gate::allows('isManager')){
            return redirect()->route('customervehicle.index')->with('delete', 'customer vehicle deleted');
        }
        if(Gate::allows('isCashier')){
            return redirect()->route('customervehicle.index')->with('delete', 'customer vehicle deleted');
        }
        else{
            abort(403);
        }
    }


    public function upload_info(Request $request) 
    {

        $id = $request['prId'];
        $brand = Brand::findOrFail($id);
        $upload = $brand->bike->where('brand_id',$id)->pluck('name','id')->all();

        return response()->json($upload);
    }

    public function child_info(Request $request) 
    {

        $id = $request['prId'];
        $bike = Bike::findOrFail($id);
        $upload = $bike->product->where('bike_id',$id)->where('status',true)->pluck('name','id')->all();

        return response()->json($upload);
    }
       
}
