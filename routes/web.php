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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    // return what you want
});
Route::get('/logout',function(){
	Auth::logout();
	redirect('/');
});
Route::get('error',function(){
	$domainId = Auth()->user()->recent_domain;
	return view('main.widgets.error',compact('domainId'));
});
Route::get('notfound',function(){
	return view('front.error.error');
});

Route::resource('/customer', 'CustomerController');
Route::resource('/product', 'ProductController');
Route::resource('/order', 'OrderController');



