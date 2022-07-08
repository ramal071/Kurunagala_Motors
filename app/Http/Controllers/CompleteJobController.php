<?php

namespace App\Http\Controllers;

use App\CompleteJob;
use Illuminate\Http\Request;
use App\ServiceRepair;
use Illuminate\Support\Facades\DB;

class CompleteJobController extends Controller
{
    public function index()
    {
    //   return CompleteJob::find(0)->getServicerepair;  
        // return view('admin.completejob.index')->with($arr);

        
        $arr= DB::table('service_repairs As sr')
        ->leftJoin('users AS ur', 'ur.id', '=', 'sr.user_id')
        ->leftJoin('customer_vehicles AS cv', 'sr.customervehicle_id', '=', 'cv.id')
        ->leftJoin('services AS s', 'sr.service_id', 's.id')
        ->select('ur.id', 'idno', 'sr.code','amount', 'is_repaircomplete', 'is_complete','fname', 'lname', 'ur.email','customervehicle_id', 'contact','paid_amount', 'charge','s.name', 'price', 'register_number')
        ->groupBy('sr.id')
        ->where('is_repaircomplete', '1')
        ->where('is_complete', '1')
        ->get();
   
        return view('admin.completejob.index', ['arr' => $arr]);
    }

}
