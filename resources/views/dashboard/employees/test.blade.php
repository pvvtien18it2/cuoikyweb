<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <title>Tính tiền</title>
</head>
<body>
    @php
    use Carbon\Carbon;


        //------------------Thông tin khách hàng------------------------------
        $rooms = DB::table("quanlyphongs")->where('phong_id',$room->id)->first();
        $timeOld =$rooms->day_create;
        $timeOld = Carbon::parse($timeOld);
        //-----------------------Tiền ngày--------------------------
        $tienphong = 0;
        $days =  $timeOld->diffInDays(Carbon::now()).'<br>';
        $times = $timeOld->diffInHours(Carbon::now()).'<br>';
        $check = $timeOld->diffForHumans(Carbon::now());
        $day = (int)$days;
        $time = (int)$times;
        $tien = DB::table("phong")->where('id',$room->id)->first();
        if ($day == 0 && $time <= 2) {
            $tienphong = $tien->hour;
        } elseif ($day == 0 && $time > 2) {
            if ($tien->hour + 20000 *($time - 2) < $tien->day ) {
                $tienphong = $tien->hour + 20000 *($time - 2);
            }
            elseif($time *$tien->hour >= $tien->day){
                $tienphong = $tien->day;
            }
        }elseif($day >= 1){
            if($tien->day * $day + ($time - (24 * $day)) * 20000 < $tien->day * ($day + 1)){
                $tienphong = $tien->day * $day + ($time - (24 * $day)) * 20000;
            }
            elseif($tien->day * $day + ($time - (24 * $day)) * 20000 >= $tien->day * ($day + 1)){
                $tienphong = $tien->day * ($day + 1) ;
            }
        }

        $day_stay = $day;
        $hour_stay = $time - ($day * 24);
        //---------------------------Tiền dịch vụ------------------------------
        $tongdichvu = 0;
        $dvs = App\phong::find($room->id)->dichvu()->get();

        foreach ($dvs as $dv){
            $tongdichvu += $dv->tongdichvu;
        }

    @endphp

    <div class="container">
        <div class="row">
            <form action="{{route('employee.thanhtoan',$room->id)}}" method="head" class="form-control-lg " style="margin: auto; width: 800px; margin-top: 50px">
                @csrf
                <div class="form-group row">
                    <label for="Tên phòng" class="col-md-5 col-form-label">Tên phòng</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{$room->tenP}} ({{$room->loaiP}})</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tên khách hàng" class="col-md-5 col-form-label">Tên khách hàng</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{$rooms->name}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Chứng minh nhân dân" class="col-md-5 col-form-label">Chứng minh nhân dân</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{$rooms->number_cmnd}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Số lượng người ở" class="col-md-5 col-form-label">Số lượng người ở</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{$rooms->people}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Số ngày ở" class="col-md-5 col-form-label">Số ngày ở</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{$day_stay}} (ngày) và {{$hour_stay}} (giờ) </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tiền dịch vụ" class="col-md-5 col-form-label">Tiền dịch vụ</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{number_format($tongdichvu)}}</span>
                        <input type="hidden" name="dichvu" value="{{$tongdichvu}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tiền phòng" class="col-md-5 col-form-label">Tiền phòng</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{number_format($tienphong)}}</span>
                        <input type="hidden" name="tienphong" value="{{$tienphong}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tổng cộng" class="col-md-5 col-form-label">Tổng cộng</label>
                    <div class="col-md-7">
                        <span class="form-control ">{{number_format($tienphong + $tongdichvu)}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 60%">
                        <button type="submit" class="btn btn-primary" style="margin: auto">Xác nhận thanh toán</button>
                        <a href="{{route('employee.quanly')}}" class="btn btn-danger" style="margin-left: 20px">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
