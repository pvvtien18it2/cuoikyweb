<?php

namespace App\Http\Controllers;

use App\phong;
use App\dichvu;
use App\quanlyphong;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empty_rooms = phong::all()->where('tinhtrang',1)->where('trong',1);
        return view('dashboard.employees.empty_room', compact('empty_rooms'));
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
        return view('dashboard.employees.edit_employee', compact('data'));
        //        return view('dashboard.employees.edit',compact('data'));
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
        return redirect()->route('employee.index');
    }
    // -----------------------------------------------Dat phong---------------------------------
    public function datphong(Request $request , $id)
    {
        $datphong = new quanlyphong();
        $datphong->phong_id = $id;
        $datphong->save();
        $room = phong::find($id);
        $room->tinhtrang = 0;
        $room->trong = 0;
        $room->save();
        return redirect()->route('employee.index')->with('mess','Đã hoàn thành việc cho thuê phòng: '.$room->tenP);
    }


    // ---------------------------------Tinh tien------------------------------------
    public function tinhtien()
    {
        $rooms = phong::all()->where('trong', 0);
        return  view('dashboard.employees.tinhtien', compact('rooms'));
    }

    // =========================Thanh toan=============================
    public function thanhtoan(Request $request, $id)
    {
        $tienphong = 0;
        $rooms = quanlyphong::all()->where($id);
        $timeOld ='';
        foreach ($rooms as $room) {
            $timeOld = $room->create_at;
        }
        $timeOld = Carbon::parse($timeOld);
        $days =  $timeOld->diffInDays(Carbon::now()).'<br>';
        $times = $timeOld->diffInHours(Carbon::now()).'<br>';
        $day = (int)$days;
        $time = (int)$times;
        $tien = phong::find($id);
        if ($day == 0 && $time <= 2) {
            $tienphong = $tien->hour;
        } elseif ($day == 0 && $time > 2) {
            if ($tien->hour + 20000 *($time - 2) < $tien->day ) {
                $tienphong = $tien->hour + 20000 *($time - 2);
            }
            elseif($time *$tien->hour >= $tien->day){
                $tienphong = $tien->day;
            }
        }elseif($day >= 1 &&  ($time - (24 * $day)) >= 1 ){
            if($tien->day * $day + ($time - (24 * $day)) * 20000 < $tien->day * ($day + 1)){
                $tienphong = $tien->day * $day + ($time - (24 * $day)) * 20000;
            }
            elseif($tien->day * $day + ($time - (24 * $day)) * 20000 >= $tien->day * ($day + 1)){
                $tienphong = $tien->day * ($day + 1) ;
            }
        }


        //Luu thanh toan vao DB Phong
        $tien->count = $tienphong + $request->tongDichVu;
        $tien->tinhtrang = 0;
        $tien->trong = 1;
        $tien->save();
        //Xoa du lieu lien quan trong dichvu
        $dvs = dichvu::where('phong_id',$id);
            $dvs->delete();
        //Xoa du lieu lien quan trong quanlyphongs
        $room = quanlyphong::find($id);
        if($room != null){
            $room->delete();
        }
        return redirect()->route('employee.index')->with('status', 'Đã thanh toán thành công phòng '.'<b>'.$tien->tenP.'</b> <br>Với tiền phòng là: '.$tienphong.'<br>Tiền dịch vụ là: '.$request->tongDichVu.'<br>Tổng cộng là: '.($tienphong+$request->tongDichVu));
    }
    // -------------------------------edit_empty_room-----------------------------------------------------
    public function edit_empty_room($id)
    {
        $data = phong::find($id);
        return view('dashboard.employees.edit_empty_room', compact('data'));
    }
    // ----------------------------------update_empty_room-------------------------------
    public function update_empty_room(Request $request, $id)
    {
        $data = phong::find($id);
        $data->trong = $request->txtTrong;
        $data->save();
        return redirect()->route('employee.index');
    }

    // ---------------------------------tinhtrang--------------------------------
    public function tinhtrang()
    {
        $clean_rooms = phong::all()->where('tinhtrang', 0);
        return view('dashboard.employees.clean_room', compact('clean_rooms'));
    }
    // ----------------------------edit_clean_room-----------------------------------
    public function edit_clean_room($id)
    {
        $data = phong::find($id);
        return view('dashboard.employees.edit_clean_room', compact('data'));
    }
    // ----------------------------update_clean_room-----------------------------------
    public function update_clean_room(Request $request, $id)
    {
        $data = phong::find($id);
        $data->tinhtrang = $request->txtTinhTrang;
        $data->save();
        return redirect()->route('employee.index');
    }
    public function quanly()
    {
        $rooms = phong::all();
        return view('dashboard.employees.employee', compact('rooms'));
    }
}
