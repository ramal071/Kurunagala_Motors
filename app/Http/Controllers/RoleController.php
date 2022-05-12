<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $arr['roles'] = Role::all();
    	return view('admin.role.index')->with($arr);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request, Role $role)
    {

        $data = $this->validate($request, [
            'name'=> 'required|unique:roles,name',
            'status'=>'required',
        ],
    [
        'name.required'=>'Please Enter Role Name',
        'name.unique' => 'Role name already exist',
        'status.required'=>'Please Enter Status',
    ]);
        
        $role->name = $request->name;
        $role->status = ($request->status) ? 1:0 ;
        $role->save();
        return redirect()->route('role.index')->with('success','Created new role successfully');
    }
    

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        $arr['role'] = $role;
        return view('admin.role.edit')->with($arr);
    }

    public function update(Request $request, Role $role)
    {
        $data = $this->validate($request, [
            'name'=> 'required',          
        ],    [
        'name.required'=>'Please Enter Role Name',        
    ]);
    
        $role->name = $request->name;
        $role->status = ($request->status) ? 1:0 ;
        $role->save();
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('role.index')->with('delete', 'Role deleted successfully');
    }
}
