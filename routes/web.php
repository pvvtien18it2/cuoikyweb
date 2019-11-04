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
    return view('theme.index');
});

//Đăng ký
Route::get('dangky',['as'=>'getdangky','uses'=>'DangKyController@dangky']);
Route::post('postdangky',['as'=>'postdangky','uses'=>'DangKyController@postdangky']);


//Đăng nhập
Route::get('dangnhap',['as'=>'getdangnhap','uses'=>'DangNhapController@dangnhap']);
Route::post('postdangnhap',['as'=>'postdangnhap','uses'=>'DangNhapController@postdangnhap']);


////Trang quản lý
//Route::get('manager',function (){
//    return view('dashboard.manager.manager');
//});


//Trang quản lý Manager
Route::resource('manager','NhanVienController');

//Đăng xuất
Route::get('getlogout',['as'=>'getlogout','uses'=>'NhanVienController@logout']);


Route::resource('employee','RoomController');
Route::get('test',function (){
    return view('dashboard.manager.manager_2');
});
