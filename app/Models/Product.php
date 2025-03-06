<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function type(){
            return $this->belongTo(TypeProduct::class,'id_type','id');
     }
     public function billDetails(){
        return $this->hasMany(BillDetail::class,'id_product','id');
     }
}
