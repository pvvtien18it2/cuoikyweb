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
Route::get('dangky',['as'=>'getdangky','uses'=>'DangKyController@dangky']);
Route::post('postdangky',['as'=>'postdangky','uses'=>'DangKyController@postdangky']);

Route::get('dangnhap',['as'=>'getdangnhap','uses'=>'DangNhapController@dangnhap']);
Route::post('postdangnhap',['as'=>'postdangnhap','uses'=>'DangNhapController@postdangnhap']);


