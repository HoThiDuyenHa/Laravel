<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    public function products(){
        return $this->belongsTo(Product::class,'id_product','id');
    }

    public function bills(){
        return $this->belongsTo(Bill::class,'id_bill','id');
    }
}
