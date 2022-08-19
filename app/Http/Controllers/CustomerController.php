<?php

namespace App\Http\Controllers;
use App\Customer;
use App\customervehicle;
use Illuminate\Http\Request;
use App\customerpendingservice;
use App\CustomerPendingPayment;
use App\ServiceRepair;
use App\bike;
use App\Brand;
use App\Product;
use App\Service;
use App\CompleteJob;
use App\User;
use Auth;
use Redirect;

class CustomerController extends Controller
{
    public function customerVehiclePage($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $customervehicle =  customervehicle::where('user_id', $user->id)->orderBy('id', 'desc')->get();   
            return view('customer.index',compact('user', 'customervehicle'));
        }
        return Redirect::route('login');
    }

    public function PendingService($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $customerpendingservice =  customerpendingservice::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            return view('customer.pendingservice',compact('user',  'customerpendingservice'));
        }
        return Redirect::route('login');
    }

    public function CustomerPendingPayment($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $customerpendingpayment =  ServiceRepair::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            return view('customer.customerpendingpayment',compact('user',  'customerpendingpayment'));
        }
        return Redirect::route('login');
    }
    
    public function ServiceRepairStock($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $servicerepair =  ServiceRepair::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            return view('customer.usedproduct',compact('user',  'servicerepair'));
        }
        return Redirect::route('login');
    }

    public function completeJob($id)
    {
        if(Auth::check()){
          
            $user = User::where('id', Auth::User()->id)->first();
            $ServiceRepair =  ServiceRepair::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            return view('customer.complete',compact('user',  'ServiceRepair'));
        }
        return Redirect::route('login');
    }


    public function ServiceRepair($id)
    {
        if(Auth::check()){          
            $user = User::where('id',Auth::User()->id)->first();
            $recordes = ServiceRepair::where('user_id', $user->id)->orderBy('id','desc')->get();
            return view('customer.servicerepair',compact('user','recordes'));
        }
        return Redirect::route('login');
    }

    public function Bike()
    {
        $arr['bike'] = Bike::all();
        return view('customer.bike')->with($arr);
    }

    public function Brand()
    {
        $arr['brand'] = Brand::all();
        return view('customer.brand')->with($arr);
    }

    public function Product()
    {
        $arr['product'] = Product::all();
        return view('customer.product')->with($arr);
    }

    public function service()
    {
        $arr['service'] = Service::all();
        return view('customer.service')->with($arr);
    }

}
