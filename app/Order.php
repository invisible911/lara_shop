<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product(){

    	return $this->hasMany(OrderProduct::class,'cart_id','id');
    }
}
