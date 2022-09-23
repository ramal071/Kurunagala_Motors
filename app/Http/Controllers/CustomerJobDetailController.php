<?php

namespace App\Http\Controllers;

use App\CustomerJobDetail;
use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Product;

class CustomerJobDetailController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['product'] = Product::all(); 
        return view('admin.customer_jobdetail.index')->with($arr);
    }

    public function create()
    {
        return view('admin.customer_jobdetail.create');
    }

}
