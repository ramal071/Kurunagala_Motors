<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workinghour;

class HomeController extends Controller
{

    public function index()
    {  
        $arr['workinghour'] = Workinghour::all();        
        return view('home')->with($arr);    
    }
    
}
