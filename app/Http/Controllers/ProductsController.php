<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use Auth;

class ProductsController extends Controller
{
    

    public function __construct()

    {

        $this->middleware('auth',['except'=>'index']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('instock','>', 0)->paginate(6);

        return view('shop.index', compact("products"));
    }



    public function edit()
    {
        if (!Auth::user()->isadmin)
        {
            return redirect()->to('/home');
        }

        $products = Product::where('instock','>', 0)->orderBy('instock','asc')->paginate(12);

        return view('product.update', compact("products"));
    }

    public function edit_product($product)
    {   
        if (!Auth::user()->isadmin)
        {
            return redirect()->to('/home');
        }

         $this->validate(request(), [

            'description'=>'required||min : 2',

            'instock'=>'required||numeric||min:0',

            'price'=>'required||numeric||min:0.1'

        ]);

        
        dd($product);

       //return view('shop.index', compact("products"));

       


    }

    
}
