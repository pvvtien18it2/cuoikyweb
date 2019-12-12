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
    $data = App\phong::find('2')->datphong()->where('id',19)->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    // return view('dashboard.employees.empty_room');
});
// Route::get('test',function(){
//     return view('dashboard.employees.select_room');
// });
//Trang quản lý của Employee
Route::prefix("/employee")->middleware(['employee','auth'])->group(function(){
    Route::resource('employee','RoomController');
    //Đổi mật khẩu

    Route::get('kiemtra','RoomController@kiemtra')->name('employee.check');

    //Chọn phòng
    Route::get('chonphong','RoomController@chonphong')->name('employee.chonphong');
    //Update chọn phòng
    Route::get('updatechonphong','RoomController@updatechonphong')->name('employee.updatechonphong');
    //dừng lại quá lâu
    Route::get('delay/{id}','RoomController@xoadelay')->name('employee.delay');
    //hủy chọn phòng
    Route::get('huy/{id}','RoomController@huychonphong')->name('employee.huy');

    //Ghi chú
    Route::get('ghichu','RoomController@ghichu')->name('employee.ghichu');
    //Thêm ghi chú
    Route::get('addghichu','RoomController@addghichu')->name('employee.addghichu');
    //Đặt phòng trước
    Route::get('datphong','RoomController@getdatphongtruoc')->name('employee.bookroom.store.get');
    Route::post('datphong','RoomController@postdatphongtruoc')->name('employee.bookroom.store');

    // Route::get('/dichvu','RoomController@dichvu')->name('edit.dichvu.store');
    Route::get('/themdichvu/{id}','RoomController@themdichvu')->name('edit.dichvu.store');
    Route::get('/dichvu/{id}','RoomController@dichvu')->name('dichvu.store');
    // Trang quản lý phòng trống
    // // Route::get('/phongtrong','RoomController@phongtrong')->name('employee.phongtrong');
    // Route::get('/edit_empty_room/{id}','RoomController@edit_empty_room')->name('employee.edit_empty_room');
    // Route::put('/update_empty_room/{id}','RoomController@update_empty_room')->name('empty.room.update');
// Trang quản lý phòng chưa dọn
    // Route::get('/tinhtrang','RoomController@tinhtrang')->name('employee.tinhtrang');
    // Route::get('/edit_clean_room/{id}','RoomController@edit_clean_room')->name('employee.edit_clean_room');
    // Route::put('/update_clean_room/{id}','RoomController@update_clean_room')->name('clean.room.update');
// Trang quản lý phòng
    Route::get('/quanly','RoomController@quanly')->name('employee.quanly');

    //Book Room
    Route::get('/bookroom/{id}', 'RoomController@book_room')->name('book_room');

    // Trang đặt phòng

    Route::get('/datphong/{id}','RoomController@datphong')->name('employee.datphong');
    // Route::get('/themdatphong','RoomController@themdatphong')->name('employee.themdatphong');

// Trang tính tiền
    Route::get('/tinhtien/{id}','RoomController@tinhtien')->name('employee.tinhtien');
    // Route::get('/tinhtien','RoomController@tinhtien')->name('employee.tinhtien');
    Route::get('/thanhtoan/{id}','RoomController@thanhtoan')->name('employee.thanhtoan');
});
Route::get('/', function () {
    return view('member.dangnhap');
});
Route::get('matkhau', 'RoomController@matkhau')->name('employee.matkhau')->middleware('auth');
//profile
Route::get('thongtin/{id}', 'RoomController@thongtin')->name('employee.thongtin')->middleware('auth');
    //Check lịch đặt phòng
//Đăng ký
Route::get('dangky',['as'=>'getdangky','uses'=>'DangKyController@dangky']);
Route::post('postdangky',['as'=>'postdangky','uses'=>'DangKyController@postdangky']);


//Đăng nhập
Route::get('dangnhap',['as'=>'login','uses'=>'DangNhapController@dangnhap']);
Route::post('postdangnhap',['as'=>'postdangnhap','uses'=>'DangNhapController@postdangnhap']);

//Đăng xuất
Route::get('getlogout',['as'=>'getlogout','uses'=>'NhanVienController@logout']);



//Trang quản lý Manager
Route::prefix("/manager")->middleware(['admin','auth'])->group(function(){
    Route::resource('manager','NhanVienController');
    Route::get('doanhthu','NhanVienController@doanhthu')->name('manager.doanhthu');
});




// Route::get('/phongtrong','RoomController@phongtrong')->name('employee.phongtrong');
// Route::get('/dichvu','RoomController@dichvu')->name('dichvu.store');
// Route::resource('employee','RoomController');









