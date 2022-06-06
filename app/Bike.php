<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $table = 'bikes';
    
    protected $fillable = ['id', 'brand_id']; 

    public function product()
    {
        return $this->hasMany(Product::class, 'bike_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function customervehicle()
    {
        return $this->hasMany(CustomerVehicle::class, 'bike_id', 'id');
    }
}
