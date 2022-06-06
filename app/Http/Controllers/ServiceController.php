<?php

namespace App\Http\Controllers;

use App\service;
use Illuminate\Http\Request;
use App\Servicetype;

class ServiceController extends Controller
{

    public function index()
    {
        $arr['services'] = service::all();
    	return view('admin.service.index')->with($arr);
    }

    public function create()
    {
        $arr['servicetype'] = Servicetype::all();
        return view('admin.service.create')->with($arr);
    }

    public function store(Request $request, service $service)
    {
        $data = $this->validate($request, [
         //   'name'=> 'required|unique:services,name',
            'name'=> 'required',
            'code'=> 'required|unique:services,code',
             ],
    [
        'name.required'=>'Please Enter service Name',
    ]);
        
        $service = new service();
        $service->servicetype_id = $request->servicetype_id;
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
        $arr['servicetype'] = ServiceType::all();
        return view('admin.service.edit')->with($arr);
    }

    public function update(Request $request, service $service)
    {
        $data = $this->validate($request, [
            'name'=> 'required',     
            'code'=> 'required',        
        ],    
        [
        'name.required'=>'Please Enter service Name',        
        ]);
        $service->code = $request->code;
        $service->name = $request->name;
        $service->servicetype_id = $request->servicetype_id;
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
