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
            'email' => 'required|email',
            'phone' => 'required|max:11numeric',
            'message' => 'required|max:255',
        ],
        [
            'employee_id.required'=>'Please enter the name !!!',
            'email.required'=>'Please enter the email !!!',
            'email.email'=>'Please enter valid email !!!',
            'phone.required'=>'Please enter the contact !!!',
            'phone.max'=>'phone number max limit = 11 !!!',
            'phone.numeric'=>'Please enter phone numeric !!!',
            'message.required'=>'Please enter the message !!!',
            'message.max'=>'max limit 255!!!',
        ]
    );

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

      //  Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('success', 'Message sent');
    }
}
