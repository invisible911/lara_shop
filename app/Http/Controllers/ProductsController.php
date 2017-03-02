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
        $products = Product::where('instock','>', 0)->orderBy('created_at','desc')->paginate(6);

        return view('shop.index', compact("products"));
    }


    /**
     * admin user get the product edit page
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (!Auth::user()->isadmin)
        {
            return redirect()->to('/home');
        }

        $products = Product::where('instock','>', 0)->orderBy('instock','asc')->paginate(9);

        return view('product.update', compact("products"));
    }

    /**
     * admin user update one product after edit
     *
     * @return \Illuminate\Http\Response
     */

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

        $product = Product::find($product);

        $description = request()->description;

        $price = request()->price;

        $instock = request()->instock;


        $product->update(compact('instock','price','description'));
        

        return back();

    }

    /**
     * admin user get the product add page
     *
     * @return \Illuminate\Http\Response
     */

    public function index_add_new_product()
    {
        if (!Auth::user()->isadmin)
        {
            return redirect()->to('/home');
        }

        
        return view('product.add');
    }

    /**
     * admin user add a new product
     *
     * @return \Illuminate\Http\Response
     */
    public function add_new_product()
    {
        if (!Auth::user()->isadmin)
        {
            return redirect()->to('/home');
        }

        $messages = collect();

        $errors = collect();

        $title = request()->title;

        $imagePath = request()->imagePath;

        $description = request()->description;

        $price = request()->price;

        $instock = request()->instock;

        try{
            $product = Product::create(compact('title','imagePath','description','price','instock'));
        }
        catch (Exception $e) {
             $errors->push('experience exception: ',  $e->getMessage(), "\n");
        }

        $messages->push($product->title." successfully added");
        
        return view('product.add',compact('errors','messages'));
    }

    
}
