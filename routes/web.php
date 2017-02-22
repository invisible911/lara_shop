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

Route::get('/cart', 'CartsController@index');

Route::get('/addtocart/{id}','ProductsController@addToCart');

Route::get('/cart','CartsController@showCart');


Route::get('/test',function (){

	$cart = App\Cart::first();

	$product_ids = $cart->cart_product();

	$cart_product =App\Cart::with('cart_product.product')->get()->first();

	dd($cart_product);

	
});
