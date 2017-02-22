<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	protected $fillable = ['imagePath', 'title', 'description', 'price','instock' ];   //



    public function cart()
    {
        return $this->belongsToMany('App\Cart','cart_products','product_id','cart_id');
    }

    public function order()
    {
        return $this->belongsToMany('App\Order','order_products','product_id','order_id');
    }
}
