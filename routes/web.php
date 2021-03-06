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

Route::get('/',function(){
	return redirect('/customer');
});
Route::get('/customer/{id}/active', 'CustomerController@active');
Route::get('/product/{id}/active', 'ProductController@active');
Route::get('/order/{id}/active', 'OrderController@active');
Route::resource('/customer', 'CustomerController');
Route::resource('/product', 'ProductController');
Route::resource('/order', 'OrderController');



