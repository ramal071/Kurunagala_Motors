<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['id','product_id','quantity','dealerprice','sellingprice','discount','color','lowestlimit','description'];

    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function damage()
    {
        return $this->hasMany(DamageProduct::class, 'damage_id', 'id');
    }

    public function recondition()
    {
        return $this->hasMany(ReconditionProduct::class, 'recondition_id', 'id');
    }

    public function servicerepair()
    {
        return $this->belongsToMany(ServiceRepair::class,'stock_service_repair','service_repair_id', 'stock_id');
    }

    public function income()
    {
        return $this->hasMany(Income::class, 'stock_id' , 'id');
    }

    public function limit()
    {
        return $this->hasMany(Limit::class, 'stock_id', 'id');
    }
}
