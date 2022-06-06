<?php

namespace App\Http\Controllers;

use App\Servicetype;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $arr['servicetypes'] = Servicetype::all();
    	return view('admin.servicetype.index')->with($arr);
    }

    public function create()
    {
        return view('admin.servicetype.create');
    }

    public function store(Request $request, Servicetype $servicetype)
    {
        $data = $this->validate($request, [
            'name'=> 'required|unique:Servicetypes,name',
            'code'=> 'required|unique:Servicetypes,code',
             ],
    [
        'name.required'=>'Please Enter Service type Name',
        'name.unique' => 'Service type name already exist',
    ]);
        
        $servicetype = new Servicetype();
        $servicetype->code = $request->code;
        $servicetype->name = $request->name;
        $servicetype->description = $request->description;
        $servicetype->save();      
        
        return redirect()->route('servicetype.index')->with('success','Created New Service type successfully');
    
    }

    public function show(Servicetype $servicetype)
    {
        //
    }

    public function edit(Servicetype $servicetype)
    {
        $arr['servicetype'] = $servicetype;
        return view('admin.servicetype.edit')->with($arr);
    }

    public function update(Request $request, Servicetype $servicetype)
    {
        $data = $this->validate($request, [
            'name'=> 'required',     
            'code'=> 'required',        
        ],    
        [
        'name.required'=>'Please Enter Service type Name',        
        ]);
        $servicetype->code = $request->code;
        $servicetype->name = $request->name;
        $servicetype->description = $request->description;
        $servicetype->save();

        return redirect()->route('servicetype.index');
    }

    public function destroy($id)
    {
        Servicetype::destroy($id);
        return redirect()->route('servicetype.index')->with('delete', 'Service type model deleted');
    }
}
