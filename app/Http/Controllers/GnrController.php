<?php

namespace App\Http\Controllers;

use App\Gnr;
use App\Product;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class GnrController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $arr['gnrs'] = Gnr::all(); 
        return view('admin.gnr.index')->with($arr);
    }

    public function create()
    {
        $arr['product'] = Product::all();
        return view('admin.gnr.create')->with($arr);
    }

    public function store(Request $request, Gnr $gnr)
    {
        $data = $this->validate($request, [ 
            'supplier_name'=> 'required|string|min:1|max:255',
            'product_id'=>'required|not_in:0',
            'contact'   =>'required',
            'email'     =>'required',
            'address'   =>'required|string|min:1|max:255',
        ],
            [
            'supplier_name.required'=>'Please enter the supplier name !!!',
            'product_id.required'   =>'Please enter the product !!!',
            ]
        );        

        $gnrcode = Helper::IDGenerator(new Gnr, 'gnrcode',5,'GNR');
        $gnr->gnrcode   = $gnrcode;
        $gnr->product_id    = $request->product_id;
        $gnr->supplier_name = $request->supplier_name;
        $gnr->contact   = $request->contact;
        $gnr->email     = $request->email;
        $gnr->address   = $request->address;
        $gnr->date      = $request->date;
        $gnr->description = $request->description;
        $gnr->save();
        return redirect()->route('gnr.index')->with('success', 'GRN created successfully');
   
    }

    public function edit(Gnr $gnr)
    {
        $arr['gnr'] = $gnr;
        $arr['product'] = Product::all();
        return view('admin.gnr.edit')->with($arr);
    }

    public function update(Request $request, Gnr $gnr)
    {
        $data = $this->validate($request, [ 
            'supplier_name'=> 'required|string|min:1|max:255',
            'product_id'=>'required|not_in:0',
            'contact'   =>'required',
            'email'     =>'required',
            'address'   =>'required|string|min:1|max:255',
        ],
            [
            'supplier_name.required'=>'Please enter the supplier name !!!',
            'product_id.required'=>'Please enter the product !!!',
            ]
        );        

        $gnr->product_id    = $request->product_id;
        $gnr->supplier_name = $request->supplier_name;
        $gnr->contact   = $request->contact;
        $gnr->email     = $request->email;
        $gnr->address   = $request->address;
        $gnr->date      = $request->date;
        $gnr->description = $request->description;
        $gnr->save();
        return redirect()->route('gnr.index');
    }

    public function destroy(Gnr $gnr)
    {
        $gnr->delete();
        return redirect()->route('gnr.index')->with('delete', 'gnr deleted');
    }
}
