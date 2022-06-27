<?php

namespace App\Http\Controllers;

use App\CompleteJob;
use Illuminate\Http\Request;
use App\ServiceRepair;

class CompleteJobController extends Controller
{
    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['completejob'] = CompleteJob::all();
        return view('admin.completejob.index')->with($arr);
    }

}
