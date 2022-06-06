<?php

namespace App\Http\Controllers;

use App\CustomerPendingPayment;
use Illuminate\Http\Request;
use App\CustomerVehicle;
use App\Service;
use App\User;

class CustomerPendingPaymentController extends Controller
{
    public function index()
    {
        $arr['customerpendingpayment'] = CustomerPendingPayment::all();
        return view('admin.customerpendingpayment.index')->with($arr);
    }

    public function create()
    {
        $arr['service'] = Service::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();

        return view('admin.customerpendingpayment.create')->with($arr);
    }

    public function store(Request $request, CustomerPendingPayment $customerpendingpayment)
    {
        $customerpendingpayment->user_id = $request->user_id;
        $customerpendingpayment->customervehicle_id = $request->customervehicle_id;
        $customerpendingpayment->service_id = $request->service_id;
        $customerpendingpayment->price = $request->price;
        $customerpendingpayment->save();
        return redirect()->route('customerpendingpayment.index')->with('success', 'Created successfully');
    }

    public function show(CustomerPendingPayment $customerpendingpayment)
    {
        //
    }

    public function edit(Request $request, CustomerPendingPayment $customerpendingpayment)
    {
         $arr['customerpendingpayment'] = $customerpendingpayment;
        $arr['service'] = Service::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
         return view('admin.customerpendingpayment.edit')->with($arr);
    }

    public function update(Request $request, CustomerPendingPayment $customerpendingpayment)
    {
        $customerpendingpayment->user_id = $request->user_id;
        $customerpendingpayment->customervehicle_id = $request->customervehicle_id;
        $customerpendingpayment->service_id = $request->service_id;
        $customerpendingpayment->price = $request->price;
        $customerpendingpayment->save();
        return redirect()->route('customerpendingpayment.index')->with('success', 'Created successfully');
    }

    public function destroy($id)
    {
        CustomerPendingPayment::destroy($id);
        return redirect()->route('customerpendingpayment.index')->with('delete', 'customer pending service deleted');
  
    }
}
