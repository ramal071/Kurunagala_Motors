<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use App\Product;

class StockController extends Controller
{

    public function index()
    {       
        $arr['stocks'] = Stock::all();
        return view('admin.stock.index')->with($arr);
    }


    public function create()
    {
        $arr['product'] = Product::all();
        return view('admin.stock.create')->with($arr);
    }

    public function store(Request $request, Stock $stock)
    {
        // $data = $this->validate($request,[

        // ]);

        $stock->product_id = $request->product_id;
        $stock->quantity = $request->quantity;
        $stock->dealerprice = $request->dealerprice;
        $stock->sellingprice = $request->sellingprice;
 
        $stock->color = $request->color;
        $stock->lowestlimit = $request->lowestlimit;
        $stock->description = $request->description;
        $stock->save();
        return redirect()->route('stock.index')->with('success', 'Stock created successfully');
    }

    public function show(Stock $stock)
    {
        
    }

    public function edit(Stock $stock)
    {
        $arr['stock'] = $stock;
        $arr['product'] = Product::all();
        return view('admin.stock.edit')->with($arr);
    }


    public function update(Request $request, Stock $stock)
    {
        $data = $this->validate($request,[

        ]);

        $stock->product_id = $request->product_id;
        $stock->quantity = $request->quantity;
        $stock->dealerprice = $request->dealerprice;
        $stock->sellingprice = $request->sellingprice;
        $stock->color = $request->color;
        $stock->lowestlimit = $request->lowestlimit;
        $stock->description = $request->description;
        $stock->save();
        return redirect()->route('stock.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index')->with('delete', 'Stock detail deleted');
    }

    // public function gnrview(Stock $stock)
    // {
    //     $arr['stocks'] = Stock::all(); 
    //     return view('admin.gnr.index')->with($arr);
    // }
}
