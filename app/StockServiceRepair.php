<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockServiceRepair extends Model
{

    protected $fillable = ['id','stock_id','qty', 'service_repair_id'];

    public function servicerepair(){
        return $this->belongsTo(ServiceRepair::class);
    }
}
