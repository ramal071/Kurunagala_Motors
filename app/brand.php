<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';   

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
