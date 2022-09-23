<?php
namespace App\Services;
use App\Service;

class SerivcesService{

    public function getPriceById($id){

        $record = Service::select('price')->where('id',$id)->first();
        return $record;

    }

}