<?php

namespace App\Http\Controllers;

use App\Workinghour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkinghourController extends Controller
{

    public function index()
    {

      //  $workinghour = Workinghour::ORDERBY('day', 'ASC')->get();
        $workinghour = DB::table('workinghours')->get();
        return view('admin.workinghour.index', compact('workinghour'));

       // return DB::table('workinghours')->get();
        // $workinghour= DB::table('workinghours')
        // ->where('day', '1')
        // ->get();
       // return view('admin.workinghour.index', ['workinghour' => $workinghour]);
    }

    public function create(Request $request)
    {
        return view('admin.workinghour.create');
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

    public function show(Workinghour $workinghour)
    {
        //
    }

    public function edit($id)
    {
        $workinghour = DB::table('workinghours')->where('id', $id)->first();        
        return view('admin.workinghour.edit', compact('workinghour'));
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
        DB::table('workinghours')->where('id', $id)->delete();
        return redirect()->route('workinghour.index')->with('delete', 'Delete successfully');
    }
}
