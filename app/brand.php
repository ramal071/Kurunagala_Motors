<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';   

    protected $fillable = ['code', 'name', 'slug', 'description'];

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function bike()
    {
        return $this->hasMany(Bike::class, 'brand_id' , 'id');
    }
}
