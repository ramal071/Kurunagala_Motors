<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class, 'bike_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
