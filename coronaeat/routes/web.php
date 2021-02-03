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

//ログインボタン、NOボタン
Route::get('admin/shop/information','Admin\ShopController@show')->middleware('auth');
//登録ボタン
Route::post('admin/shop/information','Admin\ShopController@add')->middleware('auth');
//画像を追加するボタン
Route::post('admin/shop/information','Admin\ShopController@new')->middleware('auth');
//変更ボタン
Route::get('admin/shop/edit','Admin\ShopController@edit')->middleware('auth');
//消去ボタン
Route::post('admin/shop/delete','Admin\ShopController@delete')->middleware('auth');
//アカウント消去ボタン
Route::get('admin/shop/choice','Admin\ShopController@choice')->middleware('auth');
//YESボタン
Route::post('admin/shop/login','Admin\ShopController@login')->middleware('auth');
//新規ボタン
Route::get('admin/shop/create','Admin\ShopController@create')->middleware('auth');