<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use App\ServiceRepair;
use App\Employee;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Service;
use App\Stock;

class IncomeController extends Controller
{
    public function index()
    {
        $recordes['servicerepair'] = ServiceRepair::all();
        $recordes = Income::with('servicerepair:id,code,fixprice,paid_amount')
                    //   ->with('customervehicle:register_number,id')
                    ->with('service:id,price,name')
                    //   ->with('employee:id,name')
                    ->with('stock:id,sellingprice,dealerprice')
                    ->latest()
                    ->get()
                    ->toArray();
                    // dd($recordes);
        return view('admin.income.index',compact('recordes'));
    }

        //total amount selling p  with qty
        // private function getStockPrices($stockService, $stock_ids,$qty)
        // {
        //     $price = [];
            
        //         foreach ($stock_ids as $key => $value) {
        //             $result = $stockService->getPriceById($value);
        //             $quantity = ($result->quantity - $qty[$key]) >0? $qty[$key]:$result->quantity;
        //             array_push($this->accept_quantity,$quantity);
        //             array_push($price,$result->sellingprice*$quantity);
        //         }
        //         $sum = array_sum($price);
        //         return $sum;
        
        // }

    public function create()
    {
        $arr['servicerepair'] = ServiceRepair::all();
        return view('admin.income.create')->with($arr);
    }

    public function createMonth()
    {
        $arr['servicerepair'] = ServiceRepair::all();
        return view('admin.income.createMonth')->with($arr);
    }

    public function store(Request $request, Income $income)
    {
        $data = $this->validate($request, [ 
            'code'=> 'required|string|max:255',
            'amount' => 'required',
            'stock_items_sum' => 'required',
            'charge' => 'required',
            'service_price' => 'required',
            'fixprice' => 'required',

        ],
            [
            'code.required'=>'Please enter the code !!!',
            ]
        );
        $income->code = $request->code;
        $income->amount = $request->amount;
        $income->stock_items_sum = $request->stock_items_sum;
        $income->charge = $request->charge;  
        $income->fixprice = $request->fixprice;
        $income->service_price = $request->service_price;
        $income->description = $request->description;
        $income->save();
        return redirect()->route('income.index')->with('success', 'Income Marked');
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('income.index')->with('delete', 'income deleted');
    }

    public function upload_info(Request $request) 
    {
        $id = $request['prIds'];
    
        $amount = ServiceRepair::where('code',$id)->sum('amount');

        $price = Service::where('code',$id)->sum('price');   

        $fixprice = ServiceRepair::where('code',$id)->sum('fixprice'); 

        $charge = ServiceRepair::where('code',$id)->sum('charge'); 

        $stock_items_sum = ServiceRepair::where('code',$id)->sum('stock_items_sum'); 

        $service_price = ServiceRepair::where('code',$id)->sum('service_price'); 

        $sellingprice = Stock::where('sellingprice',$id)
                                
                                ->sum('sellingprice'); 

        $dealerprice = Stock::where('dealerprice',$id)
                            
                            ->sum('dealerprice'); 

        $total_income = $sellingprice - $dealerprice + $fixprice + $charge ;

        return response()->json(['amount'=>$amount, 'charge'=>$charge, 'price'=>$price, 'service_price'=>$service_price, 'stock_items_sum'=>$stock_items_sum, 'fixprice'=>$fixprice, 'total_income'=>$total_income]);
    }
    public function getJobsperDate(Request $request)
    {
        $date = new DateTime($request->date);

        $givenDate= $date->format('Y-m-d');
      //   $amount = ServiceRepair::whereBetween('created_at', [$date." 00:00:00", $date." 23:59:59"])->sum('amount');
         

        // $price = Service::where('code',$id)->sum('price');   

        // $fixprice = ServiceRepair::where('code',$id)->sum('fixprice'); 

        // $charge = ServiceRepair::where('code',$id)->sum('charge'); 

        // $sellingprice = Stock::where('sellingprice',$id)
                                
        //                         ->sum('sellingprice'); 

        // $dealerprice = Stock::where('dealerprice',$id)
                            
        //                     ->sum('dealerprice'); 

        // $total_income = $sellingprice - $dealerprice + $fixprice + $charge + 5;
        // $total_income = $amount + 5;

         $totalRepairs = ServiceRepair::whereBetween('created_at', [$givenDate." 00:00:00", $givenDate." 23:59:59"])->get();


        return response()->json(['totalRepairs'=>$totalRepairs]);
        
        
    }

    public function child_info(Request $request) 
    {
        $id = $request['prIds'];
        $servicerepair = ServiceRepair::findOrFail($id);
        $upload = $servicerepair->income->where('servicerepair_id',$id)->where('status',true)->pluck('amount','id')->all();
        $count = SUM($upload);
        return response()->json($count);
    }
}
