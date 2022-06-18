<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactUsController extends Controller
{
    public function contactView(){
        return view('front.contact');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

      //  Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
