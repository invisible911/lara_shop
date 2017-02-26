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

        $cart->product()->sync([1,2]);

        
        
        $cart = new App\Cart ([
          'id' => 2 ,
          'user_id' => 1
          ]);

        $cart->save();
        
        $cart->product()->sync([1,2,3]);
        


      

    }
}
