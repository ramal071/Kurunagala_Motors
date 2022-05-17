<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create(Request $request)
    {

        if($request->ajax()){
            $role = Role::where('id', $request->role_id)->first();
            $permissions = $role->permissions;

            return $permissions;
        }

        $role = Role::all();

        return view('admin.users.create', ['role' => $role]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname'=>'required|max:255',
            'lname'=>'required|max:255',
            'email'=>'required|unique:users|email',
            'idno'=>'required',
            'contact'=>'required',
           // 'permission'=>'required',
            'status' => 'required',
            'password'=>'required|confirmed|between:3,255',
            'password_confirmation'=>'required',
        ]);
        // dd($request);

        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->idno = $request->idno;
        $user->role_id=$request->role_id;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->status = ($request->status) ? 1:0;
        $user->password =  Hash::make($request->password);
      
        $user->save();

        // if($request->role !=null){
        //     $user->role()->attach($request->role);        
        //     $user->save();
        // }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('users.index')->with('success', 'User created');
    }

    public function show(User $user)
    {
        return view('admin.users.show',['user'=>$user]);
    }

    public function edit(User $user)
    {
        $role = Role::get();
        $userRole = $user->role->first();
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        // dd($rolePermissions);
        // dd($userRole->name);

        return view('admin.users.edit', [
            'user'=> $user,
            'role'=>$role,
            'userRole'=>$userRole,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fname'=>'required|max:255',
            'lname'=>'required|max:255',
            'email'=>'required|email',
            'idno'=>'required',
            'contact'=>'required',
            'password'=>'confirmed',
        ]);
       // dd($request);

       $user->fname = $request->fname;
       $user->lname = $request->lname;
       $user->idno = $request->idno;
       $user->email = $request->email;
       $user->contact = $request->contact;
       $user->status = ($request->status) ? 1:0;
       if($request->password != null){
          $user->password = Hash::make($request->password);
       }
       $user->save();

       $user->role()->detach();
       $user->permissions()->detach();

      if($request->role != null){
          $user->role()->attach($request->role);
          $user->save();
    }

       if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
             $user->permissions()->attach($permission);
             $user->save();
        }
    }

       return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->role()->detach();
        $user->permissions()->detach();
        $user->delete();
        return redirect()->route('users.index')->with('delete', 'User Deleted');

        // return redirect('/users);
    }
}
