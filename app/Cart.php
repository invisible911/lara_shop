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


    public function cart_product(){

    	return $this->hasMany(CartProduct::class,'cart_id','id');
    }

    /*
     if Auth::check()
     cautious,may not assigned to a user yet
    */
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
