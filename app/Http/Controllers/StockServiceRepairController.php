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


    public function store(Request $request)
    {
        //
    }

    public function show(StockServiceRepair $stockServiceRepair)
    {
        //
    }

    public function edit(StockServiceRepair $stockServiceRepair)
    {
        //
    }

    public function update(Request $request, StockServiceRepair $stockServiceRepair)
    {
        //
    }

    public function destroy(StockServiceRepair $stockServiceRepair)
    {
        //
    }
}
