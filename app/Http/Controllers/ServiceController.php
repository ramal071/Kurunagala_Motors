<?php

namespace App\Http\Controllers;

use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{

    public function index()
    {
        if(Gate::allows('isManager')){
            $arr['services'] = service::all();
            return view('admin.service.index')->with($arr);
        }
        if(Gate::allows('isCashier')){
            $arr['services'] = service::all();
            return view('admin.service.index')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function create()
    {
        if(Gate::allows('isManager')){
            return view('admin.service.create');
        }
        else{
            abort(403);
        }   
    }

    public function store(Request $request, service $service)
    {
        $data = $this->validate($request, [
            'name'=> 'required|string|min:1|max:255|unique:services,name',
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

    public function edit(service $service)
    {
        if(Gate::allows('isManager')){
            $arr['service'] = $service;
            return view('admin.service.edit')->with($arr);
        }
        else{
            abort(403);
        }
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
        if(Gate::allows('isManager')){
            service::destroy($id);
        return redirect()->route('service.index')->with('delete', 'Service model deleted');
        }
        else{
            abort(403);
        }
       
    }
}
