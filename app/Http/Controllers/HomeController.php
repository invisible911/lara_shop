<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Order;
use Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('shop.index',compact("products"));
    }



    public function user_profile()
    {
        $user = Auth::user();

        $orders = Order::where('user_id',$user->id)->with('product')->get();

        return view('user.profile',compact("orders"));
    }
}
