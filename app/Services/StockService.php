<?php
namespace App\Services;
use App\Stock;

class StockService{

    public function getPriceById($id){

        $record = Stock::select('sellingprice')->where('id',$id)->first();
        return $record;

    }
    public function reduceQuontity($array){
        foreach ($array as $key => $value) {
            $stockrecord = Stock::where('id',$value['id'])->first();
            $data = [
                'quantity'=>$value['quantity']-1
            ];
            $stockrecord->update($data);
        }
    }

}