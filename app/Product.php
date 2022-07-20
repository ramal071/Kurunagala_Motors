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

    public function stock()
    {
        return $this->hasMany(Stock::class, 'stock_id' , 'id');
    }

    public function gnr()
    {
        return $this->hasMany(Gnr::class, 'gnr_id' , 'id');
    }

    public function servicerepair()
    {
        return $this->hasMany(ServiceRepair::class, 'product_id', 'id');
    }

    public function damage()
    {
        return $this->hasMany(DamageProduct::class, 'damage_id', 'id');
    }
    
}
