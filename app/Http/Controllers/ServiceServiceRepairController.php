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

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['service'] = Service::all();  
        
        
        return view('admin.service_servicerepair.index')->with($arr);    
    }

//     public function search(Request $request)
//     {
//         $arr['servicerepair'] = ServiceRepair::all();  
//         $arr['service'] = Service::all();  

//         $fromDate = $request->input('fromDate');
//         $toDate = $request->input('toDate');

//         $arr = DB::table('service_repairs')->select()
//         ->where('created_at', '>=', $fromDate)
//         ->where('created_at', '<=', $toDate)
//         ->get();

//       //  dd($arr);
// //return redirect()->back();
//        return view('admin.service_servicerepair.search')->with($arr);    
//     }

    public function search(Request $request)
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['service'] = Service::all();  

        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $servicerepair = servicerepair::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $servicerepair = servicerepair::latest()->get();
                }
            } else {
                $servicerepair = servicerepair::latest()->get();
            }

            return response()->json([
                'servicerepair' => $servicerepair
            ]);
        } else {
            abort(403);
        }

        return view('admin.service_servicerepair.search')->with($arr);    
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
