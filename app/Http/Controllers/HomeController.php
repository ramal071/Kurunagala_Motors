<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workinghour;
use App\ServiceRepair;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {  
        $arr['workinghour'] = Workinghour::all();        
        return view('home')->with($arr);    
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
