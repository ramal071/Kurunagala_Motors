<?php

namespace App\Http\Controllers;

use App\DamageProduct;
use Illuminate\Http\Request;
use App\Stock;
use App\Product;

class DamageProductController extends Controller
{
    public function index()
    {
        $arr['damages'] = DamageProduct::all();
        return view('admin.damage.index')->with($arr);
    }

    public function create()
    {
        $arr['product'] = Product::all();
      
        // $arr['stock'] = Stock::all();
        return view('admin.damage.create')->with($arr);
    }

    public function store(Request $request , DamageProduct $damage)
    {
        $data = $this->validate($request, [ 
            'quantity'=> 'required',
            'is_return'=>'required',
            'product_id'=>'required'
        ]);

        $damage->product_id = $request->product_id;
        $damage->quantity = $request->quantity;
        $damage->reason = $request->reason;
        $damage->is_return = ($request->is_return) ? 1:0 ;
        $damage->save();
        return redirect()->route('damage.index')->with('success', 'Created successfully.');

    }

    public function show(Request $request, DamageProduct $damageProduct)
    {
        //
    }

    public function edit(DamageProduct $damage)
    {
        $arr['damage'] = $damage;
        $arr['product'] = Product::all();
        return view('admin.damage.edit')->with($arr); 
    }

    public function update(Request $request, DamageProduct $damage)
    {
        $damage->product_id = $request->product_id;
        $damage->quantity = $request->quantity;
        $damage->reason = $request->reason;
        $damage->is_return = ($request->is_return) ? 1:0 ;
        $damage->save();
        return redirect()->route('damage.index');
    }

    public function destroy($id)
    {
        DamageProduct::destroy($id);
        return redirect()->route('damage.index')->with('delete', 'Deleted successfully');
    }
}
