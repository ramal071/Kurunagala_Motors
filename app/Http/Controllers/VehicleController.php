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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle)
    {
        $data = $this->validate($request, [
            'code'=> 'required',
            'name'=> 'required',
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

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        $arr['vehicle'] = $vehicle;
        return view('admin.vehicle.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        $data = $this->validate($request, [
            'code'=> 'required',
            'name'=> 'required',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);
        return redirect()->route('vehicle.index')->with('delete', 'Vehicle model delete successfully');
    }
}
