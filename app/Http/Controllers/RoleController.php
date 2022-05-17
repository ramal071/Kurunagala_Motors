<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\Permission;

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
    // dd($request);

        $data = $this->validate($request, [
            'role_name'=> 'required|unique:roles,name',
            'role_slug'=>'required',
            'status'=>'required',
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

        
        $listOfPermissions = explode(',', $request->roles_permissions);//create array from separated/coma permissions
        
        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();

        } 

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
            'role_name'=> 'required',          
        ],    [
        'role_name.required'=>'Please Enter Role Name',        
    ]);
    
        $role->name = $request->role_name;
        $role->slug = $request->role_slug;
        $role->status = ($request->status) ? 1:0 ;
        $role->save();

        $role->permissions()->delete();
        $role->permissions()->detach();

        $listOfPermissions = explode(',', $request->roles_permissions);
        
        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }

        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {        
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();
        return redirect()->route('role.index')->with('delete', 'Role deleted successfully');
    }
}
