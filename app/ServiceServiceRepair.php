<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceServiceRepair extends Model
{
    public function servicerepair(){
        return $this->belongsTo(ServiceRepair::class);
    }
}
