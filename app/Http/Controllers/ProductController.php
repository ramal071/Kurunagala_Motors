<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Bike;
use App\brand;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{

    public function index()
    {
        $arr['product'] = Product::all();
        return view('admin.product.index')->with($arr);
    }

    function detail($id)
    {
        $data = Product::find($id); 
        return view('detail', ['product' =>$data]);
    }

    public function create(Product $product)
    {
        $arr['bike'] = Bike::all();
        $arr['brand'] = brand::all();
        return view('admin.product.create')->with($arr);
    }

    public function store(Request $request, Product $product)
    {
        $data = $this->validate($request, [
            'code'=>'required|string|min:1|max:255',
            'name'=>'required|string|min:1|max:255',
            'product_image' => 'required',
            'status'=>'required',
            'bike_id'=>'required',
            'brand_id'=> 'required|not_in:0',

        ]);

        if($request->product_image->getClientOriginalName()){
            $ext =  $request->product_image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->product_image->storeAs('public/product/',$file);
       }
       else
       {
           $file = '';
       }

        $product->bike_id = $request->bike_id;
        $product->brand_id = $request->brand_id;
        $product->product_image = $file;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->status = ($request->status) ? 1:0;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
    
        $arr['bike'] = Bike::all();
        $arr['brand'] = brand::all();
        $arr['product'] =$product;
        return view('admin.product.edit')->with($arr);
     }


    public function update(Request $request, Product $product)
    {
     
        $data = $this->validate($request, [
            'code'=>'required|string|min:1|max:255',
            'name'=>'required|string|min:1|max:255',
            'status'=>'required',
            'bike_id'=>'required',
            'brand_id'=> 'required|not_in:0',

        ]);

        if(isset($request->product_image) && $request->product_image->getClientOriginalName()){
            $ext =  $request->product_image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->product_image->storeAs('public/product/',$file);
       }
       else
       {
        if(!$product->product_image)
        $file = '';
         else
        $file = $product->product_image;
       }

        $product->bike_id = $request->bike_id;
        $product->brand_id = $request->brand_id;
        $product->product_image = $file;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->status = ($request->status) ? 1:0;
        $product->save();
        return redirect()->route('product.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('delete', 'Product deleted successfully');
    }


    public function upload_info(Request $request) 
    {

        $id = $request['prId'];
        $brand = Brand::findOrFail($id);
        $upload = $brand->bike->where('brand_id',$id)->pluck('name','id')->all();

        return response()->json($upload);
    }

    public function child_info(Request $request) 
    {
        $id = $request['prId'];
        $bike = Bike::findOrFail($id);
        $upload = $bike->product->where('bike_id',$id)
        ->where('status',true)->pluck('name','id')->all();
        return response()->json($upload);
    }
}
