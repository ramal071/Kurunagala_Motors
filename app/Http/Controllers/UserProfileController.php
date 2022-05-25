<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;

class UserProfileController extends Controller
{
    public function userprofilepage($id)
    {
        if(Auth::check()){
            $user = User::where('id', Auth::User()->id)->first();

            return view('front.user_profile.profile');
        }
        return Redirect::route('login');
    }

    public function userprofileUpdate(Request $request, $id)
    {
        if(auth()->check())
        {
            $user = User::findorfail($id);
        }
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
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
