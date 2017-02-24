<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cart extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'id',
        'user_id',
        'session_id'
    ];


    public function product()
    {
        return $this->belongsToMany('App\Product','cart_products','cart_id','product_id')->withPivot('quantity','deleted_at')->withTimestamps();;
    }


    public function newPivot(Model $parent, array $attributes, $table, $exists,$using = NULL)
    {
        if ($parent instanceof Product) {

            return new CartProduct($parent, $attributes, $table, $exists);
            
        }
     
        return parent::newPivot($parent, $attributes, $table, $exists);
    }


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

    public function removeProduct($product)
    {

         $cart_product = $this->product()->where('product_id',$product->id)->first();

         if (! is_null($cart_product))

            $cart_product->pivot->delete();
    }

    public function reduce1Product($product)
    {

        $cart_product = $this->product()->where('product_id',$product->id)->first();

        if (! is_null($cart_product))
        {
            $quantity = $cart_product->pivot->quantity;

            if ($quantity == 1)
            {
                $cart_product->pivot->delete();
            }
            else
            {
                $quantity--;
            
                $cart_product->pivot->update(compact('quantity'));
            }
        }

    }

    
}
