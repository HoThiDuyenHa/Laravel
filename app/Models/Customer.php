<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function bills(){
            return $this->hasMany(Bill::class,'id_customer','id');
    }
}
