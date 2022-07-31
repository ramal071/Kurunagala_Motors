<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'code',
        'dealerprice',
        'sellingprice',
        'charge',
        'fixprice',
        'price',
        'total_income',
        'description',
        'service_price',
        'stock_items_sum',
];

public function service()
{
    return $this->belongsTo(Service::class, 'service_id', 'id');
}

public function servicerepair()
{
    return $this->belongsTo(ServiceRepair::class, 'servicerepair_id', 'id');
}

public function stock()
{
    return $this->belongsTo(Stock::class, 'stock_id', 'id');
}
}
