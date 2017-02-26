<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display the checkout page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.checkout');
    }

    /**
     * preceed the check out
     *
     * @return \Illuminate\Http\Response
     */


    public function checkout($request)
    {   
        // forme control
            //1 check the length of credit number
            //2 check month .year
            //

        // dump to error

        //check if avaliable and if not return error.


        // write results to db
           //1.add order 
           //2.add order product
           // 3.change the quantity of product.
    }

    
}
