<?php

namespace App\Http\Controllers;

use App\vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        $arr['vehicles'] = Vehicle::all();
    	return view('admin.vehicle.index')->with($arr);
    }

    public function create()
    {
        return view('admin.vehicle.create');
    }

    public function store(Request $request, Vehicle $vehicle)
    {
        $data = $this->validate($request, [
            'code'=> 'required|string|min:1|max:255',
            'name'=> 'required|string|min:1|max:255',
        ],
        [
            'code.required'=>'Please enter the code !!!',
            'name.required'=>'Please enter the name !!!',
        ]);

        $vehicle->code = $request->code;
        $vehicle->name = $request->name;
        $vehicle->description = $request->description;
        $vehicle->save();
        return redirect()->route('vehicle.index')->with('success', 'Vehicle model created successfully' );
    }

    public function show(vehicle $vehicle)
    {
        //
    }

    public function edit(vehicle $vehicle)
    {
        $arr['vehicle'] = $vehicle;
        return view('admin.vehicle.edit')->with($arr);
    }

    public function update(Request $request, vehicle $vehicle)
    {
        $data = $this->validate($request, [
            'code'=> 'required|string|min:1|max:255',
            'name'=> 'required|string|min:1|max:255',
        ],
        [
            'code.required'=>'Please enter the code !!!',
            'name.required'=>'Please enter the name !!!',
        ]);
        
        $vehicle->code = $request->code;
        $vehicle->name = $request->name;
        $vehicle->description = $request->description;
        $vehicle->save();
        return redirect()->route('vehicle.index');
    }

    public function destroy($id)
    {
        Vehicle::destroy($id);
        return redirect()->route('vehicle.index')->with('delete', 'Vehicle model delete successfully');
    }
}
