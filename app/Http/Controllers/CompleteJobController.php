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

        $arr= DB::table('service_repairs')
        ->where('is_repaircomplete', '1')
        ->get();
   
        return view('admin.completejob.index', ['arr' => $arr]);
    }

}
