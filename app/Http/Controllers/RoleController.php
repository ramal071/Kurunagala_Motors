<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

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
        $role->name = $request->name;
       $role->status = ($request->status) ? 1:0 ;
        $role->save();
        return redirect()->route('role.index');
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
        $role->name = $request->name;
        $role->status = ($request->status) ? 1:0 ;
        $role->save();
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('role.index');
    }
}
