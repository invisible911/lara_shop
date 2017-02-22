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
        return $this->belongsToMany('App\Product','cart_products','cart_id','product_id')->withPivot('quantity');
    }

    /*
     if Auth::check()
     cautious,may not assigned to a user yet
    */
    public function user(){
    	return $this->belongsTo("App\User");
    }


    
}
