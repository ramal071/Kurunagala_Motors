<?php

namespace App\Http\Controllers;

use App\ServiceServiceRepair;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceRepair;

class ServiceServiceRepairController extends Controller
{

    public function index()
    {
        $arr['servicerepair'] = ServiceRepair::all();  
        $arr['service'] = Service::all();  
        
        
        return view('admin.service_servicerepair.index')->with($arr);    
    }

    public function create()
    {
        //
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
