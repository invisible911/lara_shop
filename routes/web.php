<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/profile', 'HomeController@user_profile');

Route::get('/products', 'ProductsController@index');

Route::get('/cart','CartsController@showCart');

Route::post('/addtocart/{product_id}','CartsController@addToCart');

Route::post('/removefromcart/{product_id}','CartsController@removeFromCart');

Route::post('/reduce1fromcart/{product_id}','CartsController@reduce1FromCart');

Route::get('/checkout','OrdersController@index');

Route::post('/checkout','OrdersController@checkout');

Route::post('/profile','OrdersController@checkout'); //get the profile of users, and orders.

Route::post('/products','OrdersController@checkout'); //input new products and fill in instocks. adding a layer of admin


//admin


Route::get('/edit_product','ProductsController@index_edit');

Route::post('/edit_product/$product_id','ProductsController@edit_product');

Route::get('/add_new_product','ProductsController@index_add');

Route::post('/add_new_product','ProductsController@add_new_product');

Route::get('/orders','OrdersController@orders_all');




Route::get('/test',function (){

	$cart = App\Cart::first();

	$product = $cart->product;

   
    
    $r = Request::session()->regenerate();

    //dd(Request::session()->getId());

    dd(Request::session()->get('cc',null));


	dd($product);

	
});
