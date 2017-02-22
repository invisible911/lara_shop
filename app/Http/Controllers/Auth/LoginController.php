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

        $session_id = Session::getId();

        $user_id = Auth::user()->id;

        $cart = Cart::firstOrCreate(compact("user_id"));

        $session_cart = Session::get('cart',null);
        

        if($session_cart === null or empty($session_cart->product)) {

            }
        else{

                $cart->product->merge($session_cart->product);

                $cart->save();

        }

        Session::put('cart',$cart);
    }
}
