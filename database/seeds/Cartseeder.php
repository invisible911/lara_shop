<?php

use Illuminate\Database\Seeder;

class Cartseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = new App\Cart ([
 			    'id' => 1 ,
        	'user_id' => 2 
          ]);

        $cart->save();


        $cart_products = new App\CartProduct ([
 			    'cart_id' => 1 ,
        	'product_id' => 1 
          ]);

        $cart_products->save();


        $cart_products = new App\CartProduct ([
 			    'cart_id' => 1 ,
        	'product_id' => 2
          ]);

        $cart_products->save();


    }
}
