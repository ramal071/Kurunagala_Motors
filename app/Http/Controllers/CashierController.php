<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Cashier;


class CashierController extends Controller
{
    public function index()
    {
      
        $arr['cashier'] = Cashier::all();
        return view('admin.cashier.index')->with($arr);
     
    }

    public function create()
    {
        return view('admin.cashier.create');
    }

    public function store(Request $request, Cashier $cashier)
    {        
        $cashier->name = $request->name;
        $cashier->idno = $request->idno;
        $cashier->email = $request->email;
        $cashier->status = ($request->status) ? 1:0;
        $cashier->save();
        return redirect()->route('cashier.index')->with('success', 'Cashier created successfully');
    }

    public function show(Cashier $cashier)
    {
        //
    }

    public function edit(Cashier $cashier)
    {
        $arr['cashier'] = $cashier;
        return view('admin.cashier.edit')->with($arr);
    }

    public function update(Request $request, Cashier $cashier)
    {        
        $cashier->name = $request->name;
        $cashier->idno = $request->idno;
        $cashier->email = $request->email;
        $cashier->status = ($request->status) ? 1:0;
        $cashier->save();
        return redirect()->route('cashier.index');
    }

    public function destroy($id)
    {
        cashier::destroy($id);
        return redirect()->route('cashier.index')->with('delete', 'Cashier deleted');
    }
}
