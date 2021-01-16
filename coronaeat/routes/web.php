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
Route::get('admin/shop/','ShopController@show')->middleware('auth');
//登録ボタン
Route::post('admin/shop/','ShopController@add')->middleware('auth');
//変更ボタン
Route::get('admin/shop/edit','ShopController@edit')->middleware('auth');
//消去ボタン
Route::post('admin/shop/delete','ShopController@delete')->middleware('auth');
//アカウント消去ボタン
Route::get('admin/shop/choice','ShopController@choice')->middleware('auth');
//YESボタン
Route::post('admin/shop/login','ShopController@login')->middleware('auth');
//新規ボタン
Route::get('admin/shop/create','ShopController@create')->middleware('auth');