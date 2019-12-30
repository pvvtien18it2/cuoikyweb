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
//nguoidng
Route::get('/', function () {
    return view('b.index');
})->name('trangchu');


Route::get('phong/1', function () {
    return view('b.rooms1');
})->name('phong1');
Route::get('phong/2', function () {
    return view('b.rooms2');
})->name('phong2');
Route::get('phong/3', function () {
    return view('b.rooms3');
})->name('phong3');
Route::get('phong/4', function () {
    return view('b.rooms4');
})->name('phong4');

Route::get('datphongthanhcong', function () {
    return view('b.tcphong');
})->name('datphongthanhcong');
Route::get('gopythanhcong', function () {
    return view('b.tcgy');
})->name('gopythanhcong');



Route::get('contact', function () {
    return view('b.contact');
})->name('lienhej');
Route::get('datphong', function () {
    return view('b.datphong');
})->name('datphong');
//dặt phòng
// Route::get('datphong', function () {
//     return view('b.new');
// });
// Route::post('/post',[
//     'as'=>'post.store',
//     'uses' => 'blogController@store'
// ]);
// Route::get('/post', [
//     'as'=>'post.index',
//     'uses'=>'blogController@index'
// ]);



// Route::get('/post/{id}/edit',[
//     'as'=>'post.edit',
//     'uses'=> 'blogController@edit'
// ]);
// Route::put('post/{id}', [
//     'as'=>'post.update',
//     'uses'=>'blogController@update'
// ]);

// Route::delete('/post/{id}',[
//     'as' => 'post.delete',
//     'uses' => 'blogController@destroy'
// ]);
//ý kiến
// Route::get('/adcontact', [
//     'as'=>'contact.index',
//     'uses'=>'ContactController@index'
// ]);

Route::post('/contact',[
    'as'=>'contact.store',
    'uses' => 'ContactController@store'
])->name('contact');
Route::get('contact', function () {
    return view('b.contact');
})->name('lienhe');
//events
Route::get('sukien','EventsController@sukien')->name('sukien');

//Đặt phòng(khách)

//Chọn phòng
// Route::get('chonphongkhach','RoomController@chonphongkhach')->name('employee.chonphongkhach');
    Route::get('datphongkhach','RoomController@getdatphongtruockhach')->name('employee.bookroom.store.get.khach');
    Route::post('datphongkhach','RoomController@postdatphongtruockhach')->name('employee.bookroom.store.khach');
        //Update chọn phòng
    Route::get('updatechonphong','RoomController@updatechonphongkhach')->name('employee.updatechonphongkhach');

//Xem sự kiện
Route::get('xemthem/{id}', 'EventsController@xemthem')->name('xemthem');

// Route::get('/events', [
//     'as'=>'events.index',
//     'uses'=>'EventsController@index'
// ]);
// Route::post('/events',[
//     'as'=>'evetns.file',
//     'uses' => 'EventsController@store'
// ]);

// Route::post('/events',[
//     'as'=>'events.store',
//     'uses' => 'EventsController@store'
// ]);
// Route::get('events/new','EventsController@new');
// Route::get('/events/{id}/edit',[
//     'as'=>'events.edit',
//     'uses'=> 'EventsController@edit'
// ]);
// Route::put('events/{id}', [
//     'as'=>'events.update',
//     'uses'=>'EventsController@update'
// ]);
// Route::get('events/{id}','EventsController@show');
// Route::get('xemthem/{id}','EventsController@xemthem');
// Route::delete('/events/{id}',[
//     'as' => 'events.delete',
//     'uses' => 'EventsController@destroy'
// ]);

//

// ----------------Không xóa-------------------
Route::get('test',function(){
    //     $data = App\phong::find('3')->ghichu()->get()->toArray();
    //     echo count($data);
    //     // $data = App\phong::all();


    //     // $data = App\phong::find($r1->id)->ghichu()->get()->toArray();
    //     echo '<pre>';
    //     print_r($data);
    //     echo '</pre>';
    $data = App\phong::find('3');
    echo var_dump($data->songuoi);
    echo $songuoi = (string)$data->songuoi;
    echo var_dump($songuoi);
    // return view('dashboard.employees.how');
});
Route::prefix("/employee")->middleware(['employee','auth'])->group(function(){


    Route::get('/events', [
        'as'=>'events.index',
        'uses'=>'EventsController@index'
    ]);
    // Route::post('/events',[
    //     'as'=>'evetns.file',
    //     'uses' => 'EventsController@store'
    // ]);

    Route::post('/events/store',[
        'as'=>'events.store',
        'uses' => 'EventsController@store'
    ]);
    Route::get('events/new','EventsController@new')->name('new');
    Route::get('/events/{id}/edit',[
        'as'=>'events.edit',
        'uses'=> 'EventsController@edit'
    ]);
    Route::put('events/update/{id}', [
        'as'=>'events.update',
        'uses'=>'EventsController@update'
    ]);
    Route::get('events/{id}','EventsController@show')->name('show');


    Route::delete('/events/delete/{id}',[
        'as' => 'events.delete',
        'uses' => 'EventsController@destroy'
    ]);

        //ý kiến
        Route::get('/adcontact', [
        'as'=>'contact.index',
        'uses'=>'ContactController@index'
    ]);
    //Trang quản lý của Employee
    Route::resource('employee','RoomController');

    //Kiểm tra đặt phòng
    Route::get('kiemtra','RoomController@kiemtra')->name('employee.check');

    //Chọn phòng
    Route::get('chonphong','RoomController@chonphong')->name('employee.chonphong');

    //Update chọn phòng
    Route::get('updatechonphong','RoomController@updatechonphong')->name('employee.updatechonphong');

    //Ghi chú
    Route::get('ghichu','RoomController@ghichu')->name('employee.ghichu');

    //Thêm ghi chú
    Route::get('addghichu','RoomController@addghichu')->name('employee.addghichu');

    //xóa tình trạng
    Route::get('xoaghichu/{id}', 'RoomController@xoaghichu')->name('employee.xoaghichu');

    //Đặt phòng trước
    Route::get('datphong','RoomController@getdatphongtruoc')->name('employee.bookroom.store.get');
    Route::post('datphong','RoomController@postdatphongtruoc')->name('employee.bookroom.store');

    //dịch vụ
    Route::get('/themdichvu/{id}','RoomController@themdichvu')->name('edit.dichvu.store');
    Route::get('/dichvu/{id}','RoomController@dichvu')->name('dichvu.store');

    // Trang quản lý phòng
    Route::get('/quanly','RoomController@quanly')->name('employee.quanly');

    //Book Room
    Route::get('/bookroom/{id}', 'RoomController@book_room')->name('book_room');

    // Trang đặt phòng

    Route::get('/datphong/{id}','RoomController@datphong')->name('employee.datphong');

    // Trang tính tiền
    Route::get('/tinhtien/{id}','RoomController@tinhtien')->name('employee.tinhtien');
    Route::get('/thanhtoan/{id}','RoomController@thanhtoan')->name('employee.thanhtoan');
});

    //Đổi mật khẩu
    Route::get('matkhau', 'RoomController@matkhau')->name('employee.matkhau')->middleware('auth');
    //profile
    Route::get('thongtin/{id}', 'RoomController@thongtin')->name('employee.thongtin')->middleware('auth');
        //Check lịch đặt phòng
    //Đăng ký



    //Đăng nhập
    Route::get('dangnhap',['as'=>'login','uses'=>'DangNhapController@dangnhap']);
    Route::post('postdangnhap',['as'=>'postdangnhap','uses'=>'DangNhapController@postdangnhap']);

    //Đăng xuất
    Route::get('getlogout',['as'=>'getlogout','uses'=>'NhanVienController@logout']);



    //Trang quản lý Manager
    Route::prefix("/manager")->middleware(['admin','auth'])->group(function(){
        Route::resource('manager','NhanVienController');
        Route::get('doanhthuphong','NhanVienController@doanhthuphong')->name('manager.doanhthuphong');
        Route::get('doanhthudichvu','NhanVienController@doanhthudichvu')->name('manager.doanhthudichvu');
        Route::get('dangky',['as'=>'getdangky','uses'=>'DangKyController@dangky']);
        Route::post('postdangky',['as'=>'postdangky','uses'=>'DangKyController@postdangky']);
    });



    // Route::get('/phongtrong','RoomController@phongtrong')->name('employee.phongtrong');
    // Route::get('/dichvu','RoomController@dichvu')->name('dichvu.store');
    // Route::resource('employee','RoomController');
