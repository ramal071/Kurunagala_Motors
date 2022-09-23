<?php

namespace App\Http\Controllers;

use App\ServiceServiceRepair;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceRepair;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceServiceRepairController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['service'] = Service::all();  
        
        
        return view('admin.service_servicerepair.index')->with($arr);    
    }
}
