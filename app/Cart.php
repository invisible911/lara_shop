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
        return $this->belongsToMany('App\Product','cart_products','cart_id','product_id')->withPivot('quantity','deleted_at')->withTimestamps();
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

    /**
     * add a Product to a cart
     *
     * @return null
     */
    public function addProduct($product)
    {
        
        $cart = $product->cart()->where('cart_id',$this->id)->wherePivot('deleted_at',null)->first();

        if(is_null($cart))
        {
            $this->product()->save($product);
        }
        else
        {

            $quantity = $cart->pivot->quantity;

            $quantity++;

            $cart->pivot->update(compact('quantity'));
        }

    }

    /**
     * remove a Product from a cart
     *
     * @return null
     */

    public function removeProduct($product)
    {

         $cart = $product->cart()->where('cart_id',$this->id)->wherePivot('deleted_at',null)->first();

         if (! is_null($cart))

            $cart->pivot->delete();
    }

    /**
     * reduce a Product from a cart by 1
     *
     * @return null
     */

    public function reduce1Product($product)
    {

        $cart = $product->cart()->where('cart_id',$this->id)->wherePivot('deleted_at',null)->first();

        if (! is_null($cart))
        {
            $quantity = $cart->pivot->quantity;

            if ($quantity == 1)
            {
                $cart->pivot->delete();
            }
            else
            {
                $quantity--;
            
                $cart->pivot->update(compact('quantity'));
            }
        }

    }

    /**
     * reduce a Product from a cart after order transaction made
     *
     * @return null
     */

    public function order_remove_products($products)
    {
        foreach($products as $product)
        {
            $product_id = $product->id;

            $order_id = $this->id;

            $quantity = $product->pivot->quantity;

            $in_cart_product = $this->product()->where('product_id',$product_id)->wherePivot('deleted_at',null)->first();

            if(is_null($in_cart_product))

                continue;

            if ($quantity >= $in_cart_product->pivot->quantity )
            {
                $this->removeProduct($product);
            }
            else
            {
                $update_quantity = $quantity  - $in_cart_product->pivot->quantity;

                $in_cart_product->pivot->update(compact('update_quantity'));
            }
            
        }

    }
    
}
