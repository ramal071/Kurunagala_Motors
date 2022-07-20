<?php

namespace App\Http\Controllers;

use App\service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{

    public function index()
    {
        $arr['services'] = service::all();
    	return view('admin.service.index')->with($arr);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request, service $service)
    {
        $data = $this->validate($request, [
         //   'name'=> 'required|unique:services,name',
            'name'=> 'required|string|min:1|max:255',
            'code'=> 'required|unique:services,code',
            'price' => 'required|string|min:1|max:255',
             ],
    [
        'name.required'=>'Please Enter service Name',
    ]);
        
        $service = new service();
        $service->price = $request->price;
        $service->code = $request->code;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();      
        
        return redirect()->route('service.index')->with('success','Created new service successfully');
    
    }

    public function show(service $service)
    {
        //
    }

    public function edit(service $service)
    {
        $arr['service'] = $service;
        return view('admin.service.edit')->with($arr);
    }

    public function update(Request $request, service $service)
    {
        $data = $this->validate($request, [
            'name'=> 'required|string|min:1|max:255',     
            'code'=> 'required|string|min:1|max:255',    
            'price' => 'required|string|min:1|max:255',    
        ],    
        [
        'name.required'=>'Please Enter service Name',        
        ]);
        $service->code = $request->code;
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();
        
        return redirect()->route('service.index');
    }

    public function destroy($id)
    {
        service::destroy($id);
        return redirect()->route('service.index')->with('delete', 'Service model deleted');
    }
}
