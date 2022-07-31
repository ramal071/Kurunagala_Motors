<?php

namespace App\Http\Controllers;

use App\DamageProduct;
use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use Illuminate\Support\Facades\Gate;

class DamageProductController extends Controller
{
    public function index()
    {
        if(Gate::allows('isManager')){
            $arr['stock'] = Stock::all();
            $arr['product'] = Product::all();
            $arr['damages'] = DamageProduct::all();            
            return view('admin.damage.index')->with($arr);
        }
        elseif (Gate::allows('isCashier')){
            $arr['stock'] = Stock::all();
            $arr['product'] = Product::all();
            $arr['damages'] = DamageProduct::all();            
            return view('admin.damage.index')->with($arr);
        }
        else{
            abort(403);
        }
        
    //     $damages = DamageProduct::with('stock:id,quantity,product_id')
    //     ->with('product')
    //     ->with('brand:id,code,name')
    //      ->with('bike:id,brand_id,code,name')
    //     ->latest()
    //     ->get()
    //     ->toArray();
    //   // dd($recordes);

    //     return view('admin.damage.index',compact('damages'));
    }

    public function create()
    {
        if(Gate::allows('isManager')){
            $arr['stock'] = Stock::all();
            return view('admin.damage.create')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request , DamageProduct $damage)
    {
        $data = $this->validate($request, [ 
            'quantity'=> 'required',
           // 'is_return'=>'required',
            'stock_id'=>'required'
        ]);

        $damage->stock_id = $request->stock_id;
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
        if(Gate::allows('isManager')){
            $arr['damage'] = $damage;
            $arr['stock'] = Stock::all();
            return view('admin.damage.edit')->with($arr); 
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, DamageProduct $damage)
    {
        $data = $this->validate($request, [ 
            'quantity'=> 'required',
           // 'is_return'=>'required',
            'stock_id'=>'required'
        ]);

        $damage->stock_id = $request->stock_id;
        $damage->quantity = $request->quantity;
        $damage->reason = $request->reason;
        $damage->is_return = ($request->is_return) ? 1:0 ;
        $damage->save();
        return redirect()->route('damage.index');
    }

    public function destroy($id)
    {
        if(Gate::allows('isManager')){
            DamageProduct::destroy($id);
            return redirect()->route('damage.index')->with('delete', 'Deleted successfully');
        }
        else{
            abort(403);
        }
    }
}
