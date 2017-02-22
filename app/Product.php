<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	protected $fillable = ['imagePath', 'title', 'description', 'price','instock' ];   //



    public function cart_product()
    {
        return $this->belongsToMany("App\cart_product","cart_product_pivot");
    }

}
