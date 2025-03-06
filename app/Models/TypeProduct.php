<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    public function  products(){
        // Một loại sản phẩm có nhiều sản phẩm.
        return $this->hasMany(Product::class,'id_type','id');
    }
}
