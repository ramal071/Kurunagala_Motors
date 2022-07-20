<?php

namespace App\Http\Controllers;

use App\StockServiceRepair;
use Illuminate\Http\Request;
use App\Product;
use App\ServiceRepair;

class StockServiceRepairController extends Controller
{
    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['product'] = Product::all();  

        return view('admin.stock_servicerepair.index')->with($arr);  
    }

    public function create()
    {
        //
    }


}
