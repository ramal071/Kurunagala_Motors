<?php

namespace App\Http\Controllers;

use App\Workinghour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class WorkinghourController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $workinghour = DB::table('workinghours')->get();
        return view('admin.workinghour.index', compact('workinghour'));     
    }

    public function create(Request $request)
    {
        if(Gate::allows('isManager')){
            return view('admin.workinghour.create');
        }
        elseif (Gate::allows('isCashier')){
            return view('admin.workinghour.create');
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'day'=> 'required',
            'from'=> 'required',
            'to'=> 'required',
     
        ]);

        DB::table('workinghours')->insert([
            'day'=>$request->day,
            'from'=>$request->from,
            'to'=>$request->to,
        ]);
        return redirect()->route('workinghour.index')->with('success', 'created successfully' );
    }

    public function edit($id)
    {
        if(Gate::allows('isManager')){
        $workinghour = DB::table('workinghours')->where('id', $id)->first();        
        return view('admin.workinghour.edit', compact('workinghour'));
    }
    elseif (Gate::allows('isCashier')){
        $workinghour = DB::table('workinghours')->where('id', $id)->first();        
        return view('admin.workinghour.edit', compact('workinghour'));
    }
        else{
            abort(403);
        }
    }

    public function update(Request $request, Workinghour $workinghour)
    {

        $workinghour->day = $request->day;
        $workinghour->from = $request->from;
        $workinghour->to = $request->to;
        $workinghour->save();

        return redirect()->route('workinghour.index');
    }

    public function destroy($id)
    {
        if(Gate::allows('isManager')){
            DB::table('workinghours')->where('id', $id)->delete();
            return redirect()->route('workinghour.index')->with('delete', 'Delete successfully');
        }
        elseif (Gate::allows('isCashier')){
            DB::table('workinghours')->where('id', $id)->delete();
            return redirect()->route('workinghour.index')->with('delete', 'Delete successfully');
        }
    
        else{
            abort(403);
        }
    }
}
