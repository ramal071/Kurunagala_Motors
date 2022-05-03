<?php

namespace App\Http\Controllers;
use App\Bike;

use Illuminate\Http\Request;

class BikeController extends Controller
{

    public function index()
    {
        $arr['bike'] = Bike::all();
        return view('admin.bike.index')->with($arr);
    }

    public function create()
    {
        return view('admin.bike.create');
    }

    public function store(Request $request, Bike $bike)
    {
        $bike->code = $request->code;
        $bike->name = $request->name;
        $bike->description = $request->description;
        $bike->save();
        return redirect()->route('bike.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Bike $bike)
    {
        $arr['bike'] = $bike;
        return view('admin.bike.edit')->with($arr);
    }

    public function update(Request $request, Bike $bike)
    {
        $bike->code = $request->code;
        $bike->name = $request->name;
        $bike->description = $request->description;
        $bike->save();
        return redirect()->route('bike.index');
    }

    public function destroy($id)
    {
        Bike::destroy($id);
        return redirect()->route('bike.index');
    }
}
