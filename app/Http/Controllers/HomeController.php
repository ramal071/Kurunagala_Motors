<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workinghour;
use App\ServiceRepair;
use App\Product;
use App\Service;
use App\User;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
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
        return redirect()->back()->with('success', 'Message sent');
    }

    public function index()
    {  
        $arr['workinghour'] = Workinghour::all();        
        $arr['product'] = Product::all();  
        $arr['contact'] = Contact::all();  
        $arr['service'] = Service::all();  
        $arr['user'] = User::all();  

        $current_month_users = ServiceRepair::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count(); 
        $before_1_month_users = ServiceRepair::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count(); 
        $before_2_month_users = ServiceRepair::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count(); 
        $before_3_month_users = ServiceRepair::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count(); 
        $usersCount= array($current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users);


        
    

        return view('home', compact('usersCount'))->with($arr);    
    }

    public function barchart()
    {
        $arr['servicerepair'] = ServiceRepair::all();        
           $servicerepair = ServiceRepair::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');

            $months = ServiceRepair::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

            $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

            foreach ($months as $index => $month) {
                $datas[$month] = $servicerepair[$index];
            }
            return view('home',compact('datas'))->with($arr);    
    }
    
}
