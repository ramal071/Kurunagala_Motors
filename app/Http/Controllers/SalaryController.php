<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $arr['salary'] = Salary::all();
    	return view('admin.salary.index')->with($arr);
    }

    public function create()
    {
        return view('admin.salary.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Salary $salary)
    {
        //
    }

    public function edit(Salary $salary)
    {
        //
    }

    public function update(Request $request, Salary $salary)
    {
        //
    }

    public function destroy(Salary $salary)
    {
        //
    }
}
