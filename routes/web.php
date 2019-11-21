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
Route::get('test',function(){
    // $data = App\phong::find('3')->dichvu()->get()->toArray();
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    // return view('dashboard.employees.empty_room');
});

//Trang quản lý của Employee
Route::prefix("/employee")->middleware(['employee','auth'])->group(function(){
    Route::resource('employee','RoomController');

    // Route::get('/dichvu','RoomController@dichvu')->name('edit.dichvu.store');
    Route::get('/themdichvu/{id}','RoomController@themdichvu')->name('edit.dichvu.store');
    Route::get('/dichvu/{id}','RoomController@dichvu')->name('dichvu.store');
    // Trang quản lý phòng trống
    // Route::get('/phongtrong','RoomController@phongtrong')->name('employee.phongtrong');
    Route::get('/edit_empty_room/{id}','RoomController@edit_empty_room')->name('employee.edit_empty_room');
    Route::put('/update_empty_room/{id}','RoomController@update_empty_room')->name('empty.room.update');
// Trang quản lý phòng chưa dọn
    Route::get('/tinhtrang','RoomController@tinhtrang')->name('employee.tinhtrang');
    Route::get('/edit_clean_room/{id}','RoomController@edit_clean_room')->name('employee.edit_clean_room');
    Route::put('/update_clean_room/{id}','RoomController@update_clean_room')->name('clean.room.update');
// Trang quản lý phòng
    Route::get('/quanly','RoomController@quanly')->name('employee.quanly');

// Trang đặt phòng

    Route::get('/datphong/{id}','RoomController@datphong')->name('employee.datphong');
    // Route::get('/themdatphong','RoomController@themdatphong')->name('employee.themdatphong');

// Trang tính tiền
    Route::get('/tinhtien','RoomController@tinhtien')->name('employee.tinhtien');
    Route::get('/thanhtoan/{id}','RoomController@thanhtoan')->name('employee.thanhtoan');
});
Route::get('/', function () {
    return view('member.dangnhap');
});

//Đăng ký
Route::get('dangky',['as'=>'getdangky','uses'=>'DangKyController@dangky']);
Route::post('postdangky',['as'=>'postdangky','uses'=>'DangKyController@postdangky']);


//Đăng nhập
Route::get('dangnhap',['as'=>'login','uses'=>'DangNhapController@dangnhap']);
Route::post('postdangnhap',['as'=>'postdangnhap','uses'=>'DangNhapController@postdangnhap']);

//Đăng xuất
Route::get('getlogout',['as'=>'getlogout','uses'=>'NhanVienController@logout']);

//Trang quản lý
// Route::get('manager',function (){
//     return view('dashboard.manager.manager');
// });


//Trang quản lý Manager
Route::prefix("/manager")->middleware(['admin','auth'])->group(function(){
    Route::resource('manager','NhanVienController');
});




// Route::get('/phongtrong','RoomController@phongtrong')->name('employee.phongtrong');
// Route::get('/dichvu','RoomController@dichvu')->name('dichvu.store');
// Route::resource('employee','RoomController');









