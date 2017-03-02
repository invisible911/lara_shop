<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'address'
    ];

    public function product()
    {

        return $this->belongsToMany('App\Product','order_products','order_id','product_id')->withPivot('quantity')->withTimestamps();
    
    }

    /**
     * put products in an order
     *
     * @return null
     */
    public function put_orders($products)
    {
        foreach($products as $product)
        {
            $product_id = $product->id;
            $order_id = $this->id;
            $quantity = $product->pivot->quantity;

            $this->product()->save($product, compact('quantity'));

        }
        
    }
}
