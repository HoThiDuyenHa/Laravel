<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'type_products';
    public function  products(){
        // Một loại sản phẩm có nhiều sản phẩm.
        return $this->hasMany(Product::class,'id_type','id');
    }


}
