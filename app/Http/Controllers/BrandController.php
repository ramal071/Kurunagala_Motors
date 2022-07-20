<?php

namespace App\Http\Controllers;

use App\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $arr['brand'] = Brand::all();
        return view('admin.brand.index')->with($arr);
    }

    public function create(brand $brand)
    {
        return view('admin.brand.create');
    }

    public function store(Request $request, Brand $brand)
    {
        $data = $this->validate($request, [
            'code'=> 'required|string|min:1|max:255',
            'name'=> 'required|string|min:1|max:255',
        ],
        [
            'code.required'=>'Please enter the code !!!',
            'name.required'=>'Please enter the name !!!',
        ]);

        $brand->code = $request->code;
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->description = $request->description;
        $brand->save();
        return redirect()->route('brand.index')->with('success', 'Brand created succcess');
    }

    public function show(brand $brand)
    {
        //
    }

    public function edit(brand $brand)
    {
        $arr['brand'] = $brand;
        return view('admin.brand.edit')->with($arr);
    }

    public function update(Request $request, brand $brand)
    {

        $data = $this->validate($request, [
            'code'=> 'required|string|min:1|max:255',
            'name'=> 'required|string|min:1|max:255',
        ],
        [
            'code.required'=>'Please enter the code !!!',
            'name.required'=>'Please enter the name !!!',
        ]);
        
        $brand->code = $request->code;
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->description = $request->description;
        $brand->save();
        return redirect() -> route('brand.index');
    }

    public function destroy(Request $request, brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->with('delete', 'Brand deleted');
    }
}
