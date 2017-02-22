<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 
        'product_id',
        'quantity',
        'is_deleted'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }


}
