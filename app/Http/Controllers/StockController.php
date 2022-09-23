<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Gate;

class StockController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {       
        if(Gate::allows('isManager')){
            $arr['stocks'] = Stock::all();
            return view('admin.stock.index')->with($arr);
        }
        if(Gate::allows('isCashier')){
            $arr['stocks'] = Stock::all();
            return view('admin.stock.index')->with($arr);
        }
        else{
            abort(403);
        }
    }


    public function create()
    {
        if(Gate::allows('isManager')){
            $arr['product'] = Product::all();
            return view('admin.stock.create')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request, Stock $stock)
    {
        $data = $this->validate($request, [
            'product_id'=> 'required|not_in:0|unique:stocks',
            'dealerprice'=> 'required',
            'quantity'=> 'required',
            'sellingprice'=> 'required',
            'lowestlimit'=> 'required',
        ]);

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

    public function edit(Stock $stock)
    {
        if(Gate::allows('isManager')){
            $arr['stock'] = $stock;
            $arr['product'] = Product::all();
            return view('admin.stock.edit')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, Stock $stock)
    {
        $data = $this->validate($request, [
            'dealerprice'=> 'required',
            'quantity'=> 'required',
            'sellingprice'=> 'required',
            'lowestlimit'=> 'required',
        ]);

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
        if(Gate::allows('isManager')){
            $stock->delete();
            return redirect()->route('stock.index')->with('delete', 'Stock detail deleted');
        }
        else{
            abort(403);
        }
    }
}
