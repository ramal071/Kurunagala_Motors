<?php

namespace App\Http\Controllers;

use App\ServiceRepair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;
use App\Stock;
use App\CustomerVehicle;
use App\Service;
use App\Employee;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Mail;
use App\Mail\SerRepair;
use App\Services\StockService;
use App\Services\SerivcesService;

class ServiceRepairController extends Controller
{
    public function index()
    {
        $recordes = ServiceRepair::with('user:id,fname,email')
                  ->with('customervehicle:register_number,id')
                  ->with('service:id,price,name')
                  ->with('employee:id,name')
                  ->with('stock')
                  ->latest()
                  ->get()
                  ->toArray();

        //dd($recordes);
 
    return view('admin.servicerepair.index',compact('recordes'));
    }

    public function create()
    {
        $arr['service'] = Service::all();
        $arr['stock'] = Stock::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
        $arr['employee'] = Employee::all();
        $arr['product'] = Product::all();
        return view('admin.servicerepair.create')->with($arr);
    }

    private function getStockPrices($stockService, $stock_ids,$qty)
    {
        $price = [];
        foreach ($stock_ids as $key => $value) {
            $result = $stockService->getPriceById($value);
            array_push($price,$result->sellingprice*$qty[$key]);
        }
         $sum = array_sum($price);
         return $sum;
    }

    public function store(Request $request, ServiceRepair $servicerepair,StockService $stockService,SerivcesService $serviceService)
    {
        //dd($request->all());
        $data = $this->validate($request, [ 
            'user_id'=> 'required',
            'customervehicle_id'=>'required',
            'employee_id'=> 'required',
            'email'=>'required',
           
        ],
            [
            'user_id.required'=>'Please enter the employee id !!!',
            'employee_id.required'=>'Please enter the employee !!!',
            'customervehicle_id.required'=>'Please enter the bike !!!',
            'email.required'=>'Please enter the email !!!',
            ]
        );   

        $service_id = $request->service_id;
        $stock_ids = $request->stock;
        $stock_qty = $request->qty;
        $stock_items_sum = $this->getStockPrices($stockService,$stock_ids,$stock_qty);
        $service_price = $serviceService->getPriceById($service_id);
        $service_charge = $request->charge;     
        $fixprice = $request->fixprice;     
        $totalservice_price = $stock_items_sum + $service_price['price']+ $service_charge + $fixprice;

        $code = Helper::IDGenerator(new ServiceRepair, 'code',5,'Job');
        
        $data = [
            'code'=>$code,
            'user_id' => $request->user_id,
            'customervehicle_id' => $request->customervehicle_id, 
            'amount' => $totalservice_price,
            'charge' => $request->charge,
            'fixprice' => $request->fixprice,
            'description' => $request->description,
            'service_id' => $request->service_id,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'paid_amount' => $request->paid_amount,
            'status' => ($request->status) ? 1:0,
            'is_repaircomplete' => ($request->is_repaircomplete) ? 1:0,
            'is_borrow' => ($request->is_borrow) ? 1:0,
            'is_remind' => ($request->is_remind) ? 1:0,
            'is_complete' => ($request->is_complete) ? 1:0,
          //  'qty' => $request->qty,
        ];

        $record = $servicerepair->create($data);

        // $record->stock()->attach($request->stock);
        $stock = $request->stock;
        $qty = $request->qty;
        $arr = [];
        foreach ($stock as $key => $value) {
            
            $data =[
                'stock_id'=> $stock[$key],
                'qty'=> $qty[$key]
            ];
            array_push($arr,$data);
        }
        $record->stock()->sync($arr);
        
        //reduce from stock
        $stock_record = ServiceRepair::with('stock')->where('id',$record->id)->first();
        //dd($stock_record->all());
        $stockService->reduceQuontity($stock_record->stock);

        // send job start mail

        $user_email=$request->email;        
        Mail::to($user_email)->send(new SerRepair($record));

        return redirect()->route('servicerepair.index')->with('success', 'Created successfully');
    }

    public function show(Request $request, ServiceRepair $servicerepair)
    {
        
        $arr['servicerepair'] = $servicerepair;
        $arr['service'] = Service::all();
        $arr['stock'] = Stock::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
        $arr['employee'] = Employee::all();
        $arr['product'] = Product::all();

        return view('admin.servicerepair.show')->with($arr);
    }

    public function edit(Request $request, ServiceRepair $servicerepair)
    {

        $arr['servicerepair'] = $servicerepair;
        $arr['service'] = Service::all();
        $arr['stock'] = Stock::all();
        $arr['customervehicle'] = CustomerVehicle::all();
        $arr['user'] = User::all();
        $arr['employee'] = Employee::all();
        $arr['product'] = Product::all();

        $arr['service_repair_stocks']  = DB::table('service_repair_stock as srs')
        ->leftjoin('service_repairs as sr','sr.id','=','srs.service_repair_id')
                ->leftjoin('stocks as e','e.id','=','srs.stock_id')               
                ->select('*')
                 ->where('srs.service_repair_id' , $servicerepair->id)
                ->get();
           // dd($arr);

        return view('admin.servicerepair.edit')->with($arr);
    }

    public function update(Request $request, ServiceRepair $servicerepair,StockService $stockService,SerivcesService $serviceService)
    {

        $service_id = $request->service_id;
        $stock_ids = $request->stock;
        $stock_qty = $request->qty;
        $stock_items_sum = $this->getStockPrices($stockService,$stock_ids,$stock_qty);
        $service_price = $serviceService->getPriceById($service_id);
        $service_charge = $request->charge;     
        $fixprice = $request->fixprice;     
        $totalservice_price = $stock_items_sum + $service_price['price']+ $service_charge + $fixprice;

        $data = [
          
            'user_id' => $request->user_id,
            'customervehicle_id' => $request->customervehicle_id, 
            'amount' => $totalservice_price,
            'charge' => $request->charge,
            'fixprice' => $request->fixprice,
            'description' => $request->description,
            'service_id' => $request->service_id,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'paid_amount' => $request->paid_amount,
            'status' => ($request->status) ? 1:0,
            'is_remind' => ($request->is_remind) ? 1:0,
            'is_repaircomplete' => ($request->is_repaircomplete) ? 1:0,
            'is_borrow' => ($request->is_borrow) ? 1:0,
            'is_complete' => ($request->is_complete) ? 1:0,
          //  'qty' => $request->qty,   
        ];

               $servicerepair->save();
            //  $record = $servicerepair->create($data);

        $stock = $request->stock;
        $qty = $request->qty;
        $arr = [];
        foreach ($stock as $key => $value) {
            
            $data =[
                'stock_id'=> $stock[$key],
                'qty'=> $qty[$key]
            ];
            array_push($arr,$data);
            
        }
        $servicerepair->stock()->sync($arr);

        $stock_record = ServiceRepair::with('stock')->where('id',$servicerepair->id)->first();
        $stockService->reduceQuontity($stock_record->stock);
        
        return redirect()->route('servicerepair.index');

    }

    public function destroy($id)
    {
        ServiceRepair::destroy($id);
        return redirect()->route('servicerepair.index')->with('delete', 'Job deleted');
    }

    public function upload_info(Request $request) 
    {

        $id = $request['prId1'];
        $userId = User::findOrFail($id)->id;
        $upload  = DB::table('customer_vehicles')
        ->leftjoin('users','users.id','=','customer_vehicles.user_id')
        ->select('customer_vehicles.id','register_number')->where('user_id',$userId)->get();
        return response()->json($upload);
    }

    public function child_info(Request $request) 
    {
        $id = $request['prId1'];
        $customervehicle = CustomerVehicle::findOrFail($id);
        $upload = $customervehicle->customerpendingservice->where('customervehicle_id',$id)->where('status',true)->pluck('name','id')->all();
        return response()->json($upload);
    }

}
