<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\phong;
use App\dichvu;
use App\Http\Requests\ThuePhongRequest;
use App\Http\Requests\DatPhongTruocRequest;
use App\Http\Requests\GhiChuRequest;
use App\quanlyphong;
use Illuminate\Http\Request;
use App\datphong;
use App\ghichu;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.employees.fix_empty');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = phong::find($id);
        return view('dashboard.employees.edit_employee',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phong = phong::find($id);
        $phong->tinhtrang = $request->txtTinhTrang;
        $phong->trong = $request->txtTrong;
        $phong->save();
        return redirect()->route('employee.index');
        // return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // --------------------------------Dich Vu------------------------------
    public function themdichvu($id){
        $id = phong::find($id);
        return view('dashboard.employees.dichvu',compact('id'));
    }

    // -----------------------------------------Them Dich vu------------------------------------------------
    public function dichvu(Request $request)
    {
        //'nuocsuoi','coca','pepsi','bohuc',biasaigon','biaheineken','biacorona','craven','baso','anuong','combo1','combo2','combo3','combo4'
        $dichvu = new dichvu();
        $dichvu->phong_id = $request->idP;
        $dichvu->nuocsuoi =     $request->hidden_sl_1;
        $dichvu->coca =         $request->hidden_sl_2;
        $dichvu->pepsi =        $request->hidden_sl_3;
        $dichvu->bohuc =        $request->hidden_sl_4;
        $dichvu->biasaigon =    $request->hidden_sl_5;
        $dichvu->biaheineken =  $request->hidden_sl_6;
        $dichvu->biacorona =    $request->hidden_sl_7;
        $dichvu->craven =       $request->hidden_sl_8;
        $dichvu->baso =         $request->hidden_sl_9;
        $dichvu->anuong =       $request->hidden_sl_10;
        $dichvu->combo1 =       $request->hidden_sl_11;
        $dichvu->combo2 =       $request->hidden_sl_12;
        $dichvu->combo3 =       $request->hidden_sl_13;
        $dichvu->combo4 =       $request->hidden_sl_14;
        $dichvu->tongdichvu =   $dichvu->nuocsuoi * $request->hidden_gia_1 + $dichvu->coca * $request->hidden_gia_2 + $dichvu->pepsi * $request->hidden_gia_3 + $dichvu->bohuc * $request->hidden_gia_4 + $dichvu->biasaigon * $request->hidden_gia_5 + $dichvu->biaheineken * $request->hidden_gia_6 + $dichvu->biacorona * $request->hidden_gia_7 +  $dichvu->craven * $request->hidden_gia_8 + $dichvu->baso * $request->hidden_gia_9 + $dichvu->anuong * $request->hidden_gia_10 + $dichvu->combo1 * $request->hidden_gia_11 + $dichvu->combo2 * $request->hidden_gia_12 + $dichvu->combo3 * $request->hidden_gia_13 + $dichvu->combo4 * $request->hidden_gia_14;
        $dichvu->save();
        return redirect()->route('employee.quanly');
    }
    //------------------------------------------------Book room---------------------------------

    public function book_room($id){
        $book_room = phong::find($id);
        return view('dashboard.employees.book_room',compact('book_room'));

    }

    //------------------------------Dặt phòng (khách)-----------------------

    public function getdatphongtruockhach( Request $request){
        $tenP = $request->nameRoom;
        $number = $request->number;
        return view('b.datphong',compact('tenP', 'number'));
    }
    //-----------------Đặt phòng thành công (khách)-----------------------
    public function postdatphongtruockhach(DatPhongTruocRequest $request){
        $dayBookRoom = Carbon::parse($request->txtBookRoom);
        $dayOutRoom = Carbon::parse($request->txtOutRoom);
        // Month
        $monthBook = $dayBookRoom->month;
        $monthOut = $dayOutRoom->month;
        // Day
        $dayBook = $dayBookRoom->day;
        $dayOut = $dayOutRoom->day;
        // Check day
        $checkDay = $dayBookRoom->diffInDays($dayOutRoom);
        // Hour
        $hourBook = $dayBookRoom->hour;
        $hourOut = $dayOutRoom->hour;
        if($dayBookRoom->isPast() || $dayOutRoom->isPast()){
            return redirect()->route('b.datphong')->with('noteBookRoom', 'Ngày đến hoặc đi đã qua');
        }elseif($monthBook == $monthOut && $dayBook > $dayOut || $monthBook == $monthOut && $dayBook ==  $dayOut && $hourBook > $hourOut || $monthBook < $monthOut || $monthBook > $monthOut && $checkDay <= 0){
            return redirect()->route('b.datphong')->with('note', 'Ngày đi không hợp lệ so với ngày đến');
        }elseif($request->txtNumber > 4 ){
            return redirect()->route('b.datphong')->with('notepeople', 'Xin lỗi giới hạn người ở là 4');
        }elseif($request->txtNumber < 1){
            return redirect()->route('b.datphong')->with('minpeople', 'Xin lỗi ít nhất 1 người');
        }
        else{
            //datphong
            $name = $request->txtName;
            $number_cmnd = $request->txtCMND;
            $phone = $request->txtCallNumber;
            $number = $request->txtNumber;
            $dayBookRoom = $request->txtBookRoom;
            $dayOutRoom = $request->txtOutRoom;
            $token = $request->_token;
            $tenP = $request->tenP;
            $day_create = Carbon::now();

            return view('b.chonphong', compact('tenP','name', 'number_cmnd', 'phone', 'number', 'dayBookRoom', 'dayOutRoom', 'day_create'));

        }
    }

    //-----------------------------------update chọn phòng(khách)--------------------------------
    public function updatechonphongkhach(Request $request){
        $room = new datphong();
        $room->phong_id = $request->txtphong_id;
        $room->name = $request->txtName;
        $room->number_cmnd = $request->txtCMND;
        $room->phone = $request->txtCallNumber;
        $room->people = $request->txtNumber;
        $room->dayBookRoom = $request->txtBookRoom;
        $room->dayOutRoom = $request->txtOutRoom;
        $room->token = $request->_token;
        $room->day_create = Carbon::now();
        $room->save();
        return redirect()->route('trangchu');
    }

    //----------------------------------------------Đặt phòng trước------------------------------------------------

    public function getdatphongtruoc(){
        return view('dashboard.employees.datphong');
    }
    //----------------------------Đặt phòng thành công-----------------------------------------------

    public function postdatphongtruoc(DatPhongTruocRequest $request){
        $dayBookRoom = Carbon::parse($request->txtBookRoom);
        $dayOutRoom = Carbon::parse($request->txtOutRoom);
        // Month
        $monthBook = $dayBookRoom->month;
        $monthOut = $dayOutRoom->month;
        // Day
        $dayBook = $dayBookRoom->day;
        $dayOut = $dayOutRoom->day;
        // Check day
        $checkDay = $dayBookRoom->diffInDays($dayOutRoom);
        // Hour
        $hourBook = $dayBookRoom->hour;
        $hourOut = $dayOutRoom->hour;
        if($dayBookRoom->isPast() || $dayOutRoom->isPast()){
            return redirect()->route('employee.bookroom.store.get')->with('noteBookRoom', 'Ngày đến hoặc đi đã qua');
        }elseif($monthBook == $monthOut && $dayBook > $dayOut || $monthBook == $monthOut && $dayBook ==  $dayOut && $hourBook > $hourOut || $monthBook < $monthOut || $monthBook > $monthOut && $checkDay <= 0){
            return redirect()->route('employee.bookroom.store.get')->with('note', 'Ngày đi không hợp lệ so với ngày đến');
        }elseif($request->txtNumber > 4 ){
            return redirect()->route('employee.bookroom.store.get')->with('notepeople', 'Xin lỗi giới hạn người ở là 4');
        }elseif($request->txtNumber < 1){
            return redirect()->route('employee.bookroom.store.get')->with('minpeople', 'Xin lỗi ít nhất 1 người');
        }
        else{

            //datphong
            $name = $request->txtName;
            $number_cmnd = $request->txtCMND;
            $phone = $request->txtCallNumber;
            $number = $request->txtNumber;
            $dayBookRoom = $request->txtBookRoom;
            $dayOutRoom = $request->txtOutRoom;
            $token = $request->_token;
            $day_create = Carbon::now();

            return view('dashboard.employees.select_room',compact('name','number_cmnd','phone','number','dayBookRoom','dayOutRoom','day_create'));

        }
    }

    //-----------------------------------update chọn phòng--------------------------------
    public function updatechonphong(Request $request){
        // $room = datphong::find($request->txtnextID);
        $room = new datphong();
        $room->phong_id = $request->txtphong_id;
        $room->name = $request->txtName;
        $room->number_cmnd = $request->txtCMND;
        $room->phone = $request->txtCallNumber;
        $room->people = $request->txtNumber;
        $room->dayBookRoom = $request->txtBookRoom;
        $room->dayOutRoom = $request->txtOutRoom;
        $room->token = $request->_token;
        $room->day_create = Carbon::now();
        $room->save();
        return redirect()->route('employee.index');
    }
    // -----------------------------------------------Dat phong---------------------------------
    public function datphong(ThuePhongRequest $request , $id)
    {
        if($request->txtNumber > 4 ){
            return redirect()->route('employee.bookroom.store.get')->with('notepeople', 'Xin lỗi giới hạn người ở là 4');
        }elseif($request->txtNumber < 1){
            return redirect()->route('employee.bookroom.store.get')->with('minpeople', 'Xin lỗi ít nhất 1 người');
        }else{
            $datphong = new quanlyphong();
            $datphong->phong_id = $id;
            $datphong->name = $request->txtName;
            $datphong->number_cmnd = $request->txtCMND;
            $datphong->people = $request->txtNumber;
            $datphong->day_create = $request->day_create;
            $datphong->save();
            $room = phong::find($request->phong_id);
            $room->tinhtrang = 0;
            $room->trong = 0;
            $room->save();
            $book = datphong::where('token',$request->token)->first();
            if($book != null){
                $book->delete();
            }
            return redirect()->route('employee.index')->with('mess','Đã hoàn thành việc cho thuê phòng: '.$room->tenP);
        }

    }

    // ------------------------------------delay----------------------------------------------
    public function xoadelay($id){
        $delete = datphong::find($id);
        $delete->delete();
        return redirect()->route('employee.bookroom.store.get')->with('mess', 'Bạn đã dừng lại quá lâu vui lòng nhập lại');
    }
    //--------------------------------hủy----------------------------------
    public function huychonphong($id){
        $delete = datphong::find($id);
        $delete->delete();
        return redirect()->route('employee.index')->with('success', 'Hủy đặt phòng thành công');
    }

    // ---------------------------------Tinh tien------------------------------------
    public function tinhtien($id)
    {
        $room = phong::find($id);
        return view('dashboard.employees.test',compact('room'));
    }

    // =========================Thanh toan=============================
    public function thanhtoan(Request $request, $id)
    {
        $tien = phong::find($id);
        // Luu thanh toan vao DB Phong
        $tien->countPhong = $request->tienphong;
        $tien->countDichVu =$request->dichvu;
        $tien->tinhtrang = 0;
        $tien->trong = 1;
        $tien->save();
        //Xoa du lieu lien quan trong dichvu
        $dvs = dichvu::where('phong_id',$id);
            $dvs->delete();
        //Xoa du lieu lien quan trong quanlyphongs
        $room = quanlyphong::where('phong_id',$id);
        if($room != null){
            $room->delete();
        }
        return redirect()->route('employee.index')->with('status', 'Đã thanh toán thành công phòng '.'<b>'.$tien->tenP.'</b> <br>Với tiền phòng là: '.number_format($request->tienphong).'đ<br>Tiền dịch vụ là: '.number_format($request->dichvu).'đ<br>Tổng cộng là: '.number_format($request->tienphong+ $request->dichvu).'đ');
    }
    //quản lý
    public function quanly()
    {
        $rooms = phong::all();
        return view('dashboard.employees.employee', compact('rooms'));
    }

    //ghi chú
    public function ghichu(){
        $notes = ghichu::all();
        return view('dashboard.employees.ghichu',compact('notes'));
    }
    //thêm ghi chú
    public function addghichu(GhiChuRequest $request){
        $phong_id = phong::where('tenP',$request->tenP)->first();
        $ghichu = new ghichu();
        $ghichu->phong_id = $phong_id->id;
        $ghichu->name = $request->name;
        $ghichu->note = $request->note;
        $ghichu->day_create = $request->day_create;
        $ghichu->save();

        return redirect()->route('employee.ghichu')->with('note','Đã thêm thành công một ghi chú');
    }
    //thêm ghi chú
    public function xoaghichu($id)
    {

        $phong_id = ghichu::find($id);
        $tenP = phong::find($phong_id->phong_id);
        $ghichu = ghichu::find($id);
        $ghichu->delete();
        return redirect()->route('employee.ghichu')->with('tinhtrang', 'Đã xóa ghi chú phòng '.$tenP->tenP);
    }
    //--------------------------Kiểm tra đặt phòng----------------------------------
    public function kiemtra(){
        $check = datphong::all();
        return view('dashboard.employees.check_book_room',compact('check'));
    }
    //------------------------------Profile---------------------------
    public function thongtin($id){
        $user = User::find($id);
        return view('dashboard.employees.profile',compact('user'));
    }
    //--------------------------------Mật khẩu------------------------------
    public function matkhau( Request $request){
        $user = User::all()->where('id',$request->id)->first();
        if( Hash::check($request->lastPass, $user->password)){
            if($request->passNew == $request->rePassNew){
                $user->password = Hash::make($request->passNew);
                $user->update();
                return redirect()->route('employee.thongtin',$request->id)->with('status', 'Đổi mật khẩu thành công');
            }
            else{
                return redirect()->route('employee.thongtin',$request->id)->with('status', 'Mật khẩu mới không trùng nhau');
            }
        }
        else{
            return redirect()->route('employee.thongtin',$request->id)->with('status', 'Mật khẩu cũ không đúng');
        }
    }
}
