<?php

namespace App\Http\Controllers;

use App\StockServiceRepair;
use Illuminate\Http\Request;
use App\Product;
use App\ServiceRepair;

class StockServiceRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['product'] = Product::all();   
        return view('admin.stock_servicerepair.index')->with($arr);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockServiceRepair  $stockServiceRepair
     * @return \Illuminate\Http\Response
     */
    public function show(StockServiceRepair $stockServiceRepair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockServiceRepair  $stockServiceRepair
     * @return \Illuminate\Http\Response
     */
    public function edit(StockServiceRepair $stockServiceRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockServiceRepair  $stockServiceRepair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockServiceRepair $stockServiceRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockServiceRepair  $stockServiceRepair
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockServiceRepair $stockServiceRepair)
    {
        //
    }
}
