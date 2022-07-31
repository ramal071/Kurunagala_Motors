<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registerd;

class UsersController extends Controller
{
    public function index()
    {
        
        $users = User::with('roles')
                       ->whereHas('roles',function($query){
                        $query->whereNotIn('name',['manager']);
                       })
                       ->orderBy('id', 'desc')->get();
        
        if(Gate::allows('isManager')){
            return view('admin.users.index', ['users' => $users]);
        }
        elseif (Gate::allows('isCashier')){
            return view('admin.users.index', ['users' => $users]);
        }
        else{
            abort(403);
        }
    }

    public function create(Request $request, User $user)
    {

        $arr['user'] = $user;
        $arr['role'] = Role::all();

        if(Gate::allows('isManager')){
            return view('admin.users.create')->with($arr);
        }
        elseif (Gate::allows('isCashier')){
            return view('admin.users.create')->with($arr);
        }
        else{
            abort(403);
        }
    
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'fname'=>'required|max:255',
            'lname'=>'required|max:255',
            'email'=>'required|unique:users|email',
            'idno'=>'required|unique:users,idno',
            'contact'=>'required',
            'status' => 'required',
            'password'=>'required|confirmed|between:3,255',
            'password_confirmation'=>'required',
        ]);
       //  dd($request);

        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->idno = $request->idno;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->status = ($request->status) ? 1:0;
        $user->password =  Hash::make($request->password);
      
        $user->save();
      
        $user_email=$request->email;
        Mail::to($user_email)->send(new Registerd($user));

        return redirect()->route('users.index')->with('success', 'User created');
    }

    public function show(User $user)
    {
        if(Gate::allows('isManager')){
            return view('admin.users.show',['user'=>$user]);
        }
        if(Gate::allows('isCashier')){
            return view('admin.users.show',['user'=>$user]);
        }
        else{
            abort(403);
        }
    }

    public function edit(User $user)
    {        
        $arr['user'] = $user;
        $arr['role'] = Role::all();

        if(Gate::allows('isManager')){
            return view('admin.users.edit')->with($arr);
        }
        if(Gate::allows('isCashier')){
            return view('admin.users.edit')->with($arr);
        }
        else{
            abort(403);
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fname'=>'required|max:255',
            'lname'=>'required|max:255',
            'email'=>'required|email',
            'idno'=>'required',
            'contact'=>'required',
        ]);
       // dd($request);

       $user->fname = $request->fname;
       $user->lname = $request->lname;
       $user->idno = $request->idno;
       $user->email = $request->email;
       $user->contact = $request->contact;
       $user->role_id = $request->role_id;
       $user->status = ($request->status) ? 1:0;
       if($request->password != null){
          $user->password = Hash::make($request->password);
       }
       $user->save();
       return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        if(Gate::allows('isManager')){
            return redirect()->route('users.index')->with('delete', 'User Deleted');
        }
        if(Gate::allows('isCashier')){
            return redirect()->route('users.index')->with('delete', 'User Deleted');
        }
        else{
            abort(403);
        }
    }


}
