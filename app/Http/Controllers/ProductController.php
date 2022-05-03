<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Bike;
use App\brand;

class ProductController extends Controller
{

    public function index()
    {
        $arr['product'] = Product::all();
        return view('admin.product.index')->with($arr);
    }

    public function create()
    {
        $arr['bike'] = Bike::all();
        $arr['brand'] = brand::all();
        return view('admin.product.create')->with($arr);
    }

    public function store(Request $request, Product $product)
    {
        $product->bike_id = $request->bike_id;
        $product->brand_id = $request->brand_id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->limit = $request->limit;
        $product->status = ($request->status) ? 1:0;
        $product->save();
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $arr['product'] = $product;
        $arr['bike'] = Bike::all();
        $arr['brand'] = brand::all();
        return view('admin.product.edit')->with($arr);
    }

    public function update(Request $request, Product $product)
    {
        $product->bike_id = $request->bike_id;
        $product->brand_id = $request->brand_id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->limit = $request->limit;
        $product->status = ($request->status) ? 1:0;
        $product->save();
        return redirect()->route('product.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
