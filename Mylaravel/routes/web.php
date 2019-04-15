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
use App\cake;
Route::get('/',[
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

Route::get('dat-hang', [
    'as'=>'dathang',
    'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang', [
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);


Route::get('dang-nhap', [
    'as'=>'login',
    'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap', [
    'as'=>'login',
    'uses'=>'PageController@postLogin'
]);


Route::get('dang-ki', [
    'as'=>'signin',
    'uses'=>'PageController@getSignin'
]);
Route::post('dang-ki', [
    'as'=>'signin',
    'uses'=>'PageController@postSignin'
]);

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'cake'],function(){
       //admin/cake/danhsach
        Route::get('danhsach', [
            'as'=>'list',
            'uses'=>'PageController@getDanhsach'
        ]);
        Route::get('sua/{id}', [
            'as'=>'edit',
            'uses'=>'PageController@getSua'
        ]);
        Route::post('sua/{id}', [
            'as'=>'edit',
            'uses'=>'PageController@postSua'
        ]);
        Route::get('them', [
            'as'=>'add',
            'uses'=>'PageController@getThem'
        ]);
        Route::post('them', [
            'as'=>'add',
            'uses'=>'PageController@postThem'
        ]);
        Route::get('xoa/{id}', [
            'as'=>'delete',
            'uses'=>'PageController@getXoa'
        ]);
    });
    Route::group(['prefix'=>'cake_type'],function(){
        Route::get('danhsach', [
            'as'=>'listtype',
            'uses'=>'PageController@getDanhsachtype'
        ]);
        Route::get('sua/{id}', [
            'as'=>'edittype',
            'uses'=>'PageController@getSualoai'
        ]);
        Route::post('sua/{id}', [
            'as'=>'edittype',
            'uses'=>'PageController@postSualoai'
        ]);
        Route::get('them', [
            'as'=>'addtype',
            'uses'=>'PageController@getThemloai'
        ]);
        Route::post('them', [
            'as'=>'addtype',
            'uses'=>'PageController@postThemloai'
        ]);
        Route::get('xoa/{id}', [
            'as'=>'deleteloai',
            'uses'=>'PageController@getXoaloai'
        ]);
    });

});
