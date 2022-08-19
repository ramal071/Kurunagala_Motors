<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use App\employee;

class LoanController extends Controller
{
    public function index()
    {
        $arr['employee'] = Employee::all();
        $arr['loan'] = Loan::all();
        return view('admin.loan.index')->with($arr);
    }

    public function create()
    {
        $arr['employee'] = Employee::all();
        return view('admin.loan.create')->with($arr);
    }

    public function store(Request $request, Loan $loan)
    {
        $data = $this->validate($request, [ 
            'employee_id'=> 'required|not_in:0',
            'loan_amount'=>'required',
        ],
            [
            'employee_id.required'=>'Please enter the employee id !!!',
            'loan_amount.required'=>'Please enter the loan amount !!!',
            ]
        );

        $loan->employee_id = $request->employee_id;
        $loan->loan_amount = $request->loan_amount;
        $loan->description = $request->description;
        $loan->save();
        return redirect()->route('loan.index')->with('success', 'Marked loan');
    }

    public function edit(Loan $loan)
    {
        $arr['employee'] = employee::all();
        $arr['loan'] = $loan;
        return view('admin.loan.edit')->with($arr);
    }

    public function update(Request $request, Loan $loan)
    {
        $data = $this->validate($request, [ 
            'employee_id'=> 'required|not_in:0',
            'loan_amount'=>'required',
        ],
            [
            'employee_id.required'=>'Please enter the employee id !!!',
            'loan_amount.required'=>'Please enter the loan amount !!!',
            ]
        );

        $loan->employee_id = $request->employee_id;
        $loan->loan_amount = $request->loan_amount;
        $loan->description = $request->description;
        $loan->save();
        return redirect()->route('loan.index')->with('success', 'Marked loan');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loan.index')->with('delete', 'loan deleted');
    }
}
