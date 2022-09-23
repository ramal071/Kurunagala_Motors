<?php
namespace App\Services;
use App\Stock;

class StockService{

    public function getPriceById($id){
        $record = Stock::select('sellingprice','quantity')->where('id',$id)->first();
        return $record;
    }
    public function reduceQuontity($array){
        foreach ($array as $key => $value) {
            $stockrecord = Stock::where('id',$value['id'])->first();

            $reduce_qty = $value['quantity']- $value['pivot']['qty'];
            // if($reduce_qty<=0 ){
            //     $stockrecord->update(['status'=>0]);
            // }

            $data = [
                'quantity'=> $reduce_qty<0 ? 0:$reduce_qty
            ];
            $stockrecord->update($data);
        }
    }

}