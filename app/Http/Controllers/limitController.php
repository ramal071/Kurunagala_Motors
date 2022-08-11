<?php

namespace App\Http\Controllers;

use App\limit;
use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use Illuminate\Support\Facades\DB;

class limitController extends Controller
{
   
    public function index()
    {
        // $arr= DB::table('stocks As s')
        // ->leftJoin('products AS pr', 'pr.id', '=', 's.product_id')
        // // ->leftJoin('customer_vehicles AS cv', 'sr.customervehicle_id', '=', 'cv.id')
        // // ->leftJoin('services AS s', 'sr.service_id', 's.id')
        // ->select( 's.product_id', 's.quantity','s.lowestlimit')
        // ->groupBy('s.id')
        // ->where('s.lowestlimit'<'s.quantity')
        // ->get();
   
        return view('admin.limit.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(limit $limit)
    {
        //
    }

    public function edit(limit $limit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\limit  $limit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, limit $limit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\limit  $limit
     * @return \Illuminate\Http\Response
     */
    public function destroy(limit $limit)
    {
        //
    }
}
