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

Route::get('/addtocart/{product_id}','CartsController@addToCart');

Route::get('/test',function (){

	$cart = App\Cart::first();

	$product = $cart->product;

	dd($product);

	
});
