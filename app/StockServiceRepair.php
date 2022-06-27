<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockServiceRepair extends Model
{
    public function servicerepair(){
        return $this->belongsTo(ServiceRepair::class);
    }
}
