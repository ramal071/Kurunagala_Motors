<?php

namespace App\Http\Controllers;

use App\CustomerPendingPayment;
use Illuminate\Http\Request;
use App\CustomerVehicle;
use App\Service;
use App\User;
use Illuminate\Support\Facades\DB;

class CustomerPendingPaymentController extends Controller
{
    public function index()
    {
       // $arr['customerpendingpayment'] = CustomerPendingPayment::all();
        $arr= DB::table('service_repairs As sr')
        ->leftJoin('users AS ur', 'ur.id', '=', 'sr.user_id')
        ->leftJoin('customer_vehicles AS cv', 'sr.customervehicle_id', '=', 'cv.id')
        ->leftJoin('services AS s', 'sr.service_id', 's.id')
        ->select('ur.id', 'idno', 'sr.code','amount', 'is_repaircomplete', 'is_complete','fname', 'lname', 'ur.email','customervehicle_id', 'contact','paid_amount', 'charge','s.name', 'price', 'register_number')
        ->groupBy('sr.id')
        ->where('is_repaircomplete', '1')
        ->where('is_complete', '0')
        ->get();
     //   dd($arr);
        return view('admin.customerpendingpayment.index', ['arr' => $arr]);
    }

    public function create()
    {
    }

    public function store(Request $request, CustomerPendingPayment $customerpendingpayment)
    {
 }

    public function show(CustomerPendingPayment $customerpendingpayment)
    {
        //
    }

    public function edit(Request $request, CustomerPendingPayment $customerpendingpayment)
    {

    }

    public function update(Request $request, CustomerPendingPayment $customerpendingpayment)
    {
  }

    public function destroy($id)
    {
 
    }
}
