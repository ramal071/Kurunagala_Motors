<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageProduct extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
