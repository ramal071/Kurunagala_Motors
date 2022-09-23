<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;


class RoleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
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
            'role_name'=> 'required|unique:roles,name',
            'status'   =>'required',
        ],
    [
        'role_name.required'=>'Please Enter Role Name',
        'role_name.unique' => 'Role name already exist',
        'status.required'=>'Please Enter Status',
    ]);
        
        $role = new Role();
        $role->name = $request->role_name;
        $role->slug = $request->role_slug;
        $role->status = ($request->status) ? 1:0 ;
        $role->save();

        return redirect()->route('role.index')->with('success','Created new role successfully');
    }

    public function edit(Role $role)
    {
        $arr['role'] = $role;
        return view('admin.role.edit')->with($arr);
    }

    public function update(Request $request, Role $role)
    {
        $data = $this->validate($request, [
            'role_name'=> 'required',          
        ],   
        [
        'role_name.required'=>'Please Enter Role Name',        
    ]);
    
        $role->name = $request->role_name;
        $role->slug = $request->role_slug;
        $role->status = ($request->status) ? 1:0 ;
        $role->save();
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {        
        $role->delete();
        return redirect()->route('role.index')->with('delete', 'Role deleted successfully');
    }
}
