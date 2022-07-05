<?php

namespace App\Http\Controllers;

use App\ReconditionProduct;
use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use App\brand;

class ReconditionProductController extends Controller
{
    public function index()
    {
        $arr['reconditions'] = ReconditionProduct::all();
        $arr['Product'] = Product::all();
        $arr['stock'] = Stock::all();
        return view('admin.recondition.index')->with($arr);
    }

    public function create()
    {
        $arr['stock'] = Stock::all();
        return view('admin.recondition.create')->with($arr);
    }

    public function store(Request $request, ReconditionProduct $recondition)
    {

        $data = $this->validate($request, [
            
            'name'=>'required',
            'stock_id'=>'required',
        ]);

        $recondition->stock_id = $request->stock_id;
        $recondition->name = $request->name;
        $recondition->description = $request->description;
        $recondition->save();
        return redirect()->route('recondition.index')->with('success', 'Created successfully.');

    }

    public function show(ReconditionProduct $reconditionProduct)
    {
        //
    }

    public function edit(ReconditionProduct $recondition)
    {
      $arr['recondition']= $recondition;
      $arr['stock'] = Stock::all();
      return view('admin.recondition.edit')->with($arr);

    }

    public function update(Request $request, ReconditionProduct $recondition)
    {
        $recondition->stock_id = $request->stock_id;
        $recondition->name = $request->name;
        $recondition->description = $request->description;
        $recondition->save();
        return redirect()->route('recondition.index');
    }

    public function destroy($id)
    {
        ReconditionProduct::destroy($id);
        return redirect()->route('recondition.index')->with('delete', 'Deleted successfully');
    }
}
