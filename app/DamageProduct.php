<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageProduct extends Model
{
    protected $fillable = ['id', 
    'stock_id', 
    'quantity', 
    'reason',
    'is_return',
    'brand_id',
    'bike_id',
    'name',
    'code',
    'product_id',
]; 



    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
