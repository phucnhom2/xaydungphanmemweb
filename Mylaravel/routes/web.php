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
Route::get('',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);
Route::get('chi_tiet_san_pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitiet'
]);
Route::get('loai_san_pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getloaisp'
]);

Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);
Route::get('cart', 'PageController@getCart')->name('cart');

Route::get('del-cart/{id}',[
    'as'    =>      'xoagiohang',
    'uses'=>'PageController@getDelCart'
]);
