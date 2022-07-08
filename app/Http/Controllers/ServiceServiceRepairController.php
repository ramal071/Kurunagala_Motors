<?php

namespace App\Http\Controllers;

use App\ServiceServiceRepair;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceRepair;
use Illuminate\Support\Facades\DB;

class ServiceServiceRepairController extends Controller
{

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['service'] = Service::all();  
        
        
        return view('admin.service_servicerepair.index')->with($arr);    
    }

    public function search(Request $request)
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['service'] = Service::all();  

        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $arr = DB::table('service_repairs')->select()
        ->where('created_at', '>=', $fromDate)
        ->where('created_at', '<=', $toDate)
        ->get();

      //  dd($arr);
//return redirect()->back();
       return view('admin.service_servicerepair.index')->with($arr);    
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ServiceServiceRepair $serviceServiceRepair)
    {
        //
    }

    public function edit(ServiceServiceRepair $serviceServiceRepair)
    {
        //
    }

    public function update(Request $request, ServiceServiceRepair $serviceServiceRepair)
    {
        //
    }

    public function destroy(ServiceServiceRepair $serviceServiceRepair)
    {
        //
    }
}
