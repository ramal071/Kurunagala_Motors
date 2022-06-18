<?php

namespace App\Http\Controllers;

use App\Customer;
use App\customervehicle;
use Illuminate\Http\Request;


use App\User;
use Auth;
use Redirect;

class CustomerController extends Controller
{

    public function index()
    {
        $arr['customervehicle'] = customervehicle::all();  
        $arr['user'] = user::all();   
        return view('customer.index')->with($arr);    

        // if(Auth::check()){
        //     $user = User::where('id', Auth::User()->id)->first();

        //     $arr['[user'] = User::all();  
        //     $arr['[customervehicle'] = customervehicle::all();   
        //     return view('customer.index')->with($arr);    
        // }
        // return Redirect::route('login');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
