<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use Session;
Use Auth;
Use App\Cart;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated( $request, $user)
    {

        $cart_session_id = Session::get('cart_session_id','default');

        $user_id = Auth::user()->id;

        $cart = Cart::firstOrCreate(compact("user_id"));

        $session_cart = Cart::firstOrCreate(['session_id'=>$cart_session_id]);

        if(is_null($session_cart) or empty($session_cart->product))  
        {

        }

        else
            
        {
 
            foreach($session_cart->product as $product)
    
                $cart->addProduct($product);

            $cart->save();

        }

    }
}
