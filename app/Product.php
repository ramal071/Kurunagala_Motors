<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function bike()
    {
        return $this->belongsTo(Bike::class, 'bike_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id', 'id');
    }
}
