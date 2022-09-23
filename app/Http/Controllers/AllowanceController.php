<?php

namespace App\Http\Controllers;

use App\Allowance;
use Illuminate\Http\Request;
use App\Employee;

class AllowanceController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $arr['allowance'] = Allowance::all();
        return view('admin.allowance.index')->with($arr);
    }


    public function create()
    {
        $arr['employee'] = Employee::all();
        return view('admin.allowance.create')->with($arr);
    }


    public function store(Request $request ,Allowance $allowance)
    {
        $data = $this->validate($request, [ 
            'employee_id'   => 'required|not_in:0',
            'allowance'     =>'required|string|max:255',
            'allowance_type'=>'required|not_in:0',
        ],
            [
            'employee_id.required'=>'Please enter the employee !!!',
            'allowance_type.required'=>'Please enter the allowance_type !!!',
            ]
        );

        $allowance->employee_id = $request->employee_id;
        $allowance->allowance_type = $request->allowance_type;
        $allowance->allowance   = $request->allowance;
        $allowance->description = $request->description;
        $allowance->save();
        return redirect()->route('allowance.index')->with('success', 'Marked allowance');
  
    }

    public function edit(Allowance $allowance)
    {
        $arr['employee'] = employee::all();
        $arr['allowance'] = $allowance;
        return view('admin.allowance.edit')->with($arr);
    }

    public function update(Request $request, Allowance $allowance)
    {
        $data = $this->validate($request, [ 
            'allowance'=>'required|max:255',
        ]
        );
        $allowance->allowance = $request->allowance;
        $allowance->description = $request->description;
        $allowance->save();
        return redirect()->route('allowance.index')->with('success', 'Marked allowance');
  
    }

    public function destroy(Allowance $allowance)
    {
        $allowance->delete();
        return redirect()->route('allowance.index')->with('delete', 'allowance deleted');
  
    }
}
