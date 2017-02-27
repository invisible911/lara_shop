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
        

        if (Auth::check())
        {
            $user_id = Auth::user()->id;
            
            $cart = Cart::firstOrCreate(compact("user_id"));
            
        }
        else{

            if (Session::has('cart_session_id') == false)

            {
                $cart_session_id = md5(time() . Session::getId() . 'shop');

                Session::put('cart_session_id',$cart_session_id);

            }

            else{

                $cart_session_id = Session::get('cart_session_id');

            }

            $cart = Cart::firstOrCreate(['session_id'=>$cart_session_id]);


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

        $products = $cart->product->where('pivot.deleted_at',null);    

        return view('shop.shoping_cart',compact('products'));

    }

    public function addToCart($product_id)
    {
        $cart = $this->getCart();

        $product = Product::find($product_id);
        
        $cart->addProduct($product);

        return redirect()->back();
    }

    public function removeFromCart($product_id)
    {

        $cart = $this->getCart();

        $product = Product::find($product_id);

        $cart->removeProduct($product);

        return redirect()->back();

    }

    public function reduce1FromCart($product_id)
    {
        $cart = $this->getCart();

        $product = Product::find($product_id);

        $cart->reduce1Product($product);

        return redirect()->back();
    }
    

}
