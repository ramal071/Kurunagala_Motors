<?php

namespace App\Http\Controllers;

use App\CustomerJobDetail;
use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Product;

class CustomerJobDetailController extends Controller
{

    public function index()
    {
        $arr['customerjobdetail'] = CustomerJobDetail::all();
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['product'] = Product::all(); 
        return view('admin.customer_jobdetail.index')->with($arr);
    }

    public function create()
    {
        return view('admin.customer_jobdetail.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(CustomerJobDetail $customerJobDetail)
    {
        //
    }

    public function edit(CustomerJobDetail $customerJobDetail)
    {
        //
    }

    public function update(Request $request, CustomerJobDetail $customerJobDetail)
    {
        //
    }

    public function destroy(CustomerJobDetail $customerJobDetail)
    {
        //
    }
}
