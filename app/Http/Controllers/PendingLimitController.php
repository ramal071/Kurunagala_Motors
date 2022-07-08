<?php

namespace App\Http\Controllers;

use App\PendingLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stock;

class PendingLimitController extends Controller
{

    public function index()
    {

        $arr['stock'] = Stock::all();

         //   return CompleteJob::find(0)->getServicerepair;  stocksstocks
        // return view('admin.completejob.index')->with($arr);

        // $arr=DB::table('stocks')
        // ->SELECT('id',  'quantity' , 'lowestlimit')
        //      ->FROM ('stocks')
        //     ->WHERE  ((('quantity')<('lowestlimit')))
        //     ->get();

        // if((('quantity')<('lowestlimit')))
        return view('admin.lowlimit.index', ['arr' => $arr]);
    
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
     * @param  \App\PendingLimit  $pendingLimit
     * @return \Illuminate\Http\Response
     */
    public function show(PendingLimit $pendingLimit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PendingLimit  $pendingLimit
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingLimit $pendingLimit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PendingLimit  $pendingLimit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PendingLimit $pendingLimit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PendingLimit  $pendingLimit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingLimit $pendingLimit)
    {
        //
    }
}
