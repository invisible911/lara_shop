<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class OrdersController extends Controller
{
    

    public function __construct()

    {

        $this->middleware('auth');

    }
    
    /**
     * Display the checkout page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $total_price = Session::get('total_price');

        if ($total_price > 0)
        {
            return view('shop.checkout');
        }

        return back();
        

    }

    /**
     * preceed the check out
     *
     * @return \Illuminate\Http\Response
     */


    public function checkout()
    {   

        
        

        $this->validate(request(), [

            'name'=>'required||min : 1',

            'card_name'=>'required||min : 1',

            'address'=>'required||min : 20',

            'card_number' => 'required|ccn',  //

            'card_cvc' => 'required|cvc',

            'total_price'=>'required||numeric||min:0.1',

        ]);


        $total_price = request()-> total_price;

        $products = Session::get('order_product_list');

        $is_success = true;

        $is_success_payment = $this->credit_deduct(request()->toArray());
       
        $errors = collect();

        

        if ($is_success_payment)
        {
            //check if avaliable and if not return erro
            foreach($products as $product)
            {
                if($product->pivot->quantity > $product->instock)
                {
                    
                    $is_success = false;

                    $error_message = 'Item: '.$product->name.' is not avaliable.'. 'instock number:'.$product->instock.' you oder quantity: '. $product->pivot->quantity;

                    $errors->push($error_message);

                }

            }

            //1.add order 
           //2.add order product
           // 3.change the quantity of product.

        }
        else
        {
            $error_message = 'Transaction faild. please verify your credit card info.';

            $errors->push($error_message);

            $is_success = false;

        }


        return view('shop.check_result',compact('is_success','errors','products'));

           
    }

    /**
     *  persudo function for  communiting card organization and process the transaction. 
     *
     * @return true or false 
     */
    public function credit_deduct(array $payment_info)
    {
        $card_name = $payment_info['card_name'];

        $card_number = $payment_info['card_number'];

        $card_expiry_date = $payment_info['card_expiry_date'];

        $card_cvc = $payment_info['card_cvc'];

        $total_price = $payment_info['total_price'];

        // comminutes and get the result returned

        return true;
    }

    
}
