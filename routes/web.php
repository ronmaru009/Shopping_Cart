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
Route::get('/cart', 'CartController@showCart');
Route::get('/invoice', 'CartController@show_invoice');

Route::post('/home/add', 'CartController@addToCart');
Route::get('/cart/delete/{product_id}/{id}', 'CartController@delete_item');

