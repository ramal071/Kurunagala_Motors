<?php

namespace App\Http\Controllers;

use App\ReconditionProduct;
use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use App\brand;
use Illuminate\Support\Facades\Gate;

class ReconditionProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        if(Gate::allows('isManager')){
            $arr['reconditions'] = ReconditionProduct::all();
            $arr['Product'] = Product::all();
            $arr['stock'] = Stock::all();
            return view('admin.recondition.index')->with($arr);
        }
        elseif (Gate::allows('isCashier')){
            $arr['reconditions'] = ReconditionProduct::all();
            $arr['Product'] = Product::all();
            $arr['stock'] = Stock::all();
            return view('admin.recondition.index')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function create()
    {
        if(Gate::allows('isManager')){
            $arr['stock'] = Stock::all();
            return view('admin.recondition.create')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request, ReconditionProduct $recondition)
    {

        $data = $this->validate($request, [
            
            'stock_id'=>'required|not_in:0',
            'quantity'=>'required',
        ]);

        $recondition->stock_id = $request->stock_id;
        $recondition->description = $request->description;
        $recondition->quantity = $request->quantity;
        $recondition->save();
        return redirect()->route('recondition.index')->with('success', 'Created successfully.');

    }

    public function edit(ReconditionProduct $recondition)
    {
      if(Gate::allows('isManager')){
        $arr['recondition']= $recondition;
        $arr['stock'] = Stock::all();
        return view('admin.recondition.edit')->with($arr);
        }
        else{
            abort(403);
        }

    }

    public function update(Request $request, ReconditionProduct $recondition)
    {
        $data = $this->validate($request, [
            
            'stock_id'=>'required|not_in:0',
            'quantity'=>'required',
        ]);

        $recondition->stock_id = $request->stock_id;
        $recondition->quantity = $request->quantity;
        $recondition->description = $request->description;
        $recondition->save();
        return redirect()->route('recondition.index');
    }

    public function destroy($id)
    {
        if(Gate::allows('isManager')){
            ReconditionProduct::destroy($id);
            return redirect()->route('recondition.index')->with('delete', 'Deleted successfully');
        }
        else{
            abort(403);
        }
    }
}
