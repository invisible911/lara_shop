<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
    	'id',
        'user_id',
        'session_id'
    ];


    public function product()
    {
        return $this->belongsToMany('App\Product','cart_products','cart_id','product_id')->withPivot('quantity')->withTimestamps();;
    }

    /*
     if Auth::check()
     cautious,may not assigned to a user yet
    */
    public function user(){
    	return $this->belongsTo("App\User");
    }


    public function addProduct($product)
    {
        
        $cart = $product->cart()->where('cart_id',$this->id)->first();

        if(is_null($cart))
        {
            $this->product()->save($product);
        }
        else
        {
            $cart_product = $this->product()->where('product_id',$product->id)->first();
            $quantity = $cart_product->pivot->quantity;
            $quantity++;
            $cart_product->pivot->update(compact('quantity'));
        }

    }

    
}
