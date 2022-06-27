<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\customervehicle;
use Redirect;
use Illuminate\Support\Facades\Gate;
use Hash;

class UserProfileController extends Controller
{
    public function userprofilepage($id)
    {
        if(Auth::check()){
            $user = User::where('id', Auth::User()->id)->first();

            return view('front.user_profile.profile',compact('user'));
        }
        return Redirect::route('login');
    }


    public function userprofileUpdate(Request $request)
    {
        $request->validate([
            'fname'=> 'required|string',
            'lname'=> 'required|string',
            'idno'=> 'required|string',
            'contact' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'max:17'],
            'email' => 'required|email',         
          ]);

            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');
            $user->idno = $request->input('idno');
            $user->update();
            return redirect()->back()->with('success', 'Updated');
    }

    public function userpasswordpage($id)
    {
        if(Auth::check()){
            $user = User::where('id', Auth::User()->id)->first();

            return view('front.user_profile.password',compact('user'));
        }
        return Redirect::route('login');
    }

    public function userpasswordUpdate(Request $request)
    {
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("delete", 'Current Password Mismatched');
        }

        if(strcmp($request->get('current-password'),$request->get('password'))==0){
            return redirect()->back()->with("delete", 'New password same with current');
        }

        $request->validate([
            'current-password' => 'required',
            'password' => 'nullable|min:6|confirmed',   
          ]);

          $user = Auth::user();
          $user->password=bcrypt($request->get('password'));
          $user->save();

          return redirect()->back()->with("success", 'Password Updated');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
