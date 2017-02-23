<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Session;

use App\Cart;

use App\Product;


class CartsController extends Controller
{
    protected function getCart()
    {
        $session_id = Session::getId();

        if (Auth::check())
        {
            $user_id = Auth::user()->id;
            
            $cart = Cart::firstOrCreate(compact("user_id"));
            
        }
        else{

            $session_cart = Session::get('cart',null);
            
            // for user not signed in, assign a cart associated with session id
            if(is_null($session_cart))

                $cart = Cart::firstOrCreate(compact("session_id"));

            else
                $cart = $session_cart;
                $cart->save();

        }

        return $cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        
        $cart = $this->getCart();

        $products = $cart->product;
            
        Session::put('cart',$cart);

        return view('shop.shoping_cart',compact('products'));

    }

    public function addToCart($product_id)
    {
        $cart = $this->getCart();

        $product = Product::find($product_id);
        
        $cart->addProduct($product);
        
        //dd($cart->product->toArray());

        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
