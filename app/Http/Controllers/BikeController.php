<?php

namespace App\Http\Controllers;
use App\brand;
use App\Bike;


use Illuminate\Http\Request;

class BikeController extends Controller
{

    public function index()
    {
        $arr['bike'] = Bike::all();
        return view('admin.bike.index')->with($arr);
    }

    public function create(Bike $bike)
    {
        $arr['brand'] = brand::all();
        return view('admin.bike.create')->with($arr);
    }

    public function store(Request $request, Bike $bike)
    {
        $data = $this->validate($request, [ 
            'name'=> 'required|string|min:1|max:255',
            'code'=>'required|unique:bikes,name',
            'brand_id'=>'required'
        ],
            [
            'name.required'=>'Please enter the name !!!',
            'code.required'=>'Please enter the code !!!',
            'code.unique' => 'This code already used',
            ]
        );
    
        $bike->brand_id = $request->brand_id;
        $bike->code = $request->code;
        $bike->name = $request->name;
        $bike->slug = $request->slug;
        $bike->description = $request->description;
        $bike->save();
        return redirect()->route('bike.index')->with('success', 'Bike model created');
    }

    public function show($id)
    {
        //
    }

    public function edit(Bike $bike)
    {

        $arr['bike'] = $bike;
        $arr['brand'] = brand::all();
        return view('admin.bike.edit')->with($arr);
    }

    public function update(Request $request, Bike $bike)
    {
        $data = $this->validate($request, [ 
            'name'=> 'required|string|min:1|max:255',
            'code'=>'required|string|min:1|max:255',
        ],
            [
            'name.required'=>'Please enter the name !!!',
            'code.required'=>'Please enter the code !!!',
            ]
        );

        $bike->code = $request->code;
        $bike->name = $request->name;
        $bike->slug = $request->slug;
        $bike->description = $request->description;
        $bike->save();
        $bike->brand_id = $request->brand_id;
        return redirect()->route('bike.index');
    }

    public function destroy($id)
    {
        Bike::destroy($id);
        return redirect()->route('bike.index')->with('delete', 'Bike model deleted');
    }

    
}
