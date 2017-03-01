<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Auth;

use App\Order;

use Illuminate\Support\Facades\Cache;

use App\Jobs\OrderTransaction;

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

            'total_price'=>'required||numeric||min:0',

        ]);


        $payment_details = request()->toArray();

        $products = Session::get('order_product_list');

        $payment_details['products'] = $products;

        $key = md5(time() . Session::getId() . 'order_id');

        $user_id = Auth::user()->id;

        $payment_details['user_id'] = $user_id;

        $payment_details['key_is_success'] = $key.'_is_success';
       
        $payment_details['key_errors'] = $key.'_errors'; 

        //dd($payment_details);
        $job = (new OrderTransaction($payment_details));
        
        $this->dispatch($job);

        //set_time_limit(60);

        for ($i = 0; $i < 29; ++$i) {

            $is_success = Cache::get($payment_details['key_is_success'],null);

            $errors = Cache::get($payment_details['key_errors'],null);

            if (!is_null($is_success) and !is_null($errors)){

                break;
            }

            sleep(1);
        }

        $name = $payment_details['name'];

        $address = $payment_details['address'];

        return view('shop.checkout_result',compact('is_success','errors','products','name','address'));
           
    }

    public function orders_all()
    {
        if (!Auth::user()->isadmin)
        {
            return redirect()->to('/home');
        }

        $orders = Order::with('product')->paginate(3);

        return view('user.orders',compact("orders"));
    }

   
    
}
