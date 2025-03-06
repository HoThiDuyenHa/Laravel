<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     public function billdetail(){
        return $this->hasMany(BillDetail::class,'id_bill','id');
     }
     
     public function customer(){
        return $this->belongsTo(Customer::class,'id_customer','id');
     }
}
