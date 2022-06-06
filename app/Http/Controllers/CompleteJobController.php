<?php

namespace App\Http\Controllers;

use App\CompleteJob;
use Illuminate\Http\Request;

class CompleteJobController extends Controller
{
    public function index()
    {
        $arr['completejob'] = CompleteJob::all();
        return view('admin.completejob.index')->with($arr);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(CompleteJob $completeJob)
    {
        //
    }

    public function edit(CompleteJob $completeJob)
    {
        //
    }

    public function update(Request $request, CompleteJob $completeJob)
    {
        //
    }

    public function destroy(CompleteJob $completeJob)
    {
        //
    }
}
