<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id', 
        'quantity',
        'is_deleted'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product',"cart_product_pivot");
    }


}
