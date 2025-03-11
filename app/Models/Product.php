<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
     public function type(){
            return $this->belongTo(TypeProduct::class,'id_type','id');
     }
     public function billDetails(){
        return $this->hasMany(BillDetail::class,'id_product','id');
     }

     use HasFactory;

     protected $table = 'products';
     protected $fillable = ['name','id_type','description','unit_price','promotion_price', 'image','unit','new'];
 }

