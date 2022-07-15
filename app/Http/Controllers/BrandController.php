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
     //   $this->authorize('create', brand::class); //policy
        return view('admin.brand.create');
    }

    public function store(Request $request, Brand $brand)
    {
        $data = $this->validate($request, [
            'code'=> 'required',
            'name'=> 'required',
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
        $this->authorize('edit', $brand); //policy

    //    $arr['brand'] = $brand;
        return view('admin.brand.edit')->with($arr);
    }

    public function update(Request $request, brand $brand)
    {
       //   $this->authorize('update', $brand); //policy

        //  if (Gate::allows('isAdmin')) {
        //  //   abort(403);
        //    dd('admin');
        // }else{
        //     dd('not admin');
        // }

        $data = $this->validate($request, [
            'code'=> 'required',
            'name'=> 'required',
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
      //  $this->authorize('delete', $brand); //policy
        $brand->delete();
        return redirect()->route('brand.index')->with('delete', 'Brand deleted');
    }

    // function fetch(Request $request)
    // {
    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         $data = DB::table('brands')->where('name', 'LIKE', '%{$query}%')->get();
    //         $output = '<ul class="dropdown-menu"
    //         style="display:block;
    //         position:relative"
    //         >';
    //         foreach ($data as $row) 
    //         {
    //             $output .='<li><a href="#">'.$row->name.'</a></li>';
    //         }
    //         $output .='<ul>';
    //         echo $output;
    //     }
    // }
}
