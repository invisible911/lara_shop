<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartProduct extends Pivot 
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'cart_products';
    
    protected $fillable = [
        'cart_id',
        'product_id', 
        'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
