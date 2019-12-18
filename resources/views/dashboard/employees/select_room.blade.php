<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="120">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chọn phòng</title>
    {{--  css  --}}
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('resources\dashboard\employees\select_room.css') }}">

    {{--  icon  --}}
    <link href="{{url('resources/icon/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{url('resources/icon/css/brands.css')}}" rel="stylesheet">
    <link href="{{url('resources/icon/css/solid.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="row table" style="padding-left: 20px">
            @php
                use Carbon\Carbon;
                $now = Carbon::now();
                $arr = Array();
                $rooms1 = DB::table('phong')->where('tang',1)->get();
                $rooms2 = DB::table('phong')->where('tang',2)->get();
                $rooms3 = DB::table('phong')->where('tang',3)->get();
                $rooms4 = DB::table('phong')->where('tang',4)->get();
                $rooms5 = DB::table('phong')->where('tang',5)->get();
                $rooms6 = DB::table('phong')->where('tang',6)->get();
                $rooms7 = DB::table('phong')->where('tang',7)->get();
                $rooms8 = DB::table('phong')->where('tang',8)->get();
                $rooms9 = DB::table('phong')->where('tang',9)->get();

                $rooms = App\datphong::all()->where('id','!=',$idNow->id);
                $count = count($rooms);
                $people = App\phong::all();
            @endphp

            @php
                //Ngày đến và đi cần check
                $idNow->dayBookRoom;
                $dayStartCheck =Carbon::parse($idNow->dayBookRoom);
                $dayOutCheck = Carbon::parse($idNow->dayOutRoom);
                $dayStart = $dayStartCheck->day;
                $monthStart = $dayStartCheck->month;
                $dayOut = $dayOutCheck->day;
                $monthOut = $dayOutCheck->month;
                @endphp
            {{--  check  --}}
            @if($count >= 1)
            @foreach ($rooms as $room)
                @php
                    //Dữ liệu cần check
                    $dayStartRoom =Carbon::parse($room->dayBookRoom);
                    $dayOutRoom = Carbon::parse($room->dayOutRoom);
                    $checkDayStart = $dayStartRoom->day;
                    $checkMonthStart = $dayStartRoom->month;
                    $checkDayOut = $dayOutRoom->day;
                    $checkMonthOut = $dayOutRoom->month;
                    //Ngày đến trong khoảng đã có phòng ở
                    if ($dayStart >= $checkDayStart && $dayStart <= $checkDayOut){
                        $idFail = $room->phong_id;
                        array_push($arr, $idFail);
                    //Ngày đi trong khoảng đã có phòng ở
                    }elseif($dayOut >= $checkDayStart && $dayOut <= $checkDayOut){
                        $idFail = $room->phong_id;
                        array_push($arr, $idFail);
                    }

                @endphp
            @endforeach
            @endif
            @foreach ($people as $p)
                @php


                    if($p->songuoi < $idNow->people){
                        $idFail = $p->id;
                        array_push($arr, $idFail);
                    }
                    else{
                        $arr;
                    }
                    //Check hiện tại tình trạng hoặc trống (Đặt ngay tại thời điểm này)
                    $dayStartRoom =Carbon::parse($idNow->dayBookRoom);
                    $check = $now->diffInHours($dayStartRoom);
                    //Chỉ cho đặt trước nữa ngày
                    if( $dayStartRoom->isFuture() && $check <= 12){
                        if($p->tinhtrang == 0 || $p->trong == 0 ){
                                    $idFail = $p->id;
                                    array_push($arr, $idFail);
                        }
                    }elseif( $dayStartRoom->isFuture() && $check > 12){
                                $arr;
                    }
                @endphp
            @endforeach
                @php
                    if($arr != null){
                        $arr = array_unique($arr);
                        $arr = array_values($arr);
                    }
                        //echo '<pre>';
                        //print_r($arr);
                        //echo '</pre>';
                @endphp
            <h2 style="text-align: center; font-size: 60px; padding: 20px">Lựa chọn phòng phù hợp với bạn</h2>
        <table class="table table-bordered table-responsive-md table-striped">
            <tr>
                <td>
                    @if ($arr != null)
                        @foreach ($rooms1 as $r1)
                            @php
                                $data = App\phong::find($r1->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                                    @if(in_array($r1->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r1->tenP}} ({{$r1->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r1->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                                    $c = App\datphong::find($idNow->id);
                                                    $day_create = Carbon::parse($c->day_create);
                                                    $checkMin = $now->diffInMinutes($day_create);
                                                @endphp
                                                        @if($checkMin >= 4 && $day_create->isPast())
                                                            </form>
                                                            <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                                        @else
                                                            <button type="submit" class="btn btn-success">Chọn</button>
                                                            </form>
                                                        @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms1 as $r1)
                            @php
                                $data = App\phong::find($r1->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                            <div class="btn-group">
                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r1->tenP}} ({{$r1->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r1->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                            @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                            @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms2 as $r2)
                            @php
                                $data = App\phong::find($r2->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                                    @if(in_array($r2->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r2->tenP}} ({{$r2->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r2->tenP}} ({{$r2->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r2->tenP}} ({{$r2->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r2->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms2 as $r2)
                            @php
                                $data = App\phong::find($r2->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r2->tenP}} ({{$r2->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r2->tenP}} ({{$r2->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r2->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms3 as $r3)
                                @php
                                    $data = App\phong::find($r3->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                                    @if(in_array($r3->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r3->tenP}} ({{$r3->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r3->tenP}} ({{$r3->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r3->tenP}} ({{$r3->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r3->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms3 as $r3)
                            @php
                                $data = App\phong::find($r3->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r3->tenP}} ({{$r3->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r3->tenP}} ({{$r3->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r3->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms4 as $r4)
                                @php
                                    $data = App\phong::find($r4->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                                    @if(in_array($r4->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r4->tenP}} ({{$r4->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r4->tenP}} ({{$r4->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r4->tenP}} ({{$r4->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r4->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms4 as $r4)
                            @php
                                $data = App\phong::find($r4->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r4->tenP}} ({{$r4->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r4->tenP}} ({{$r4->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r4->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms5 as $r5)
                            @php
                                $data = App\phong::find($r5->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                                    @if(in_array($r5->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r5->tenP}} ({{$r5->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r5->tenP}} ({{$r5->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r5->tenP}} ({{$r5->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r5->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms5 as $r5)
                            @php
                                $data = App\phong::find($r5->id)->ghichu()->get();
                                $countData = count($data);
                            @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r5->tenP}} ({{$r5->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r5->tenP}} ({{$r5->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r5->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms6 as $r6)
                                @php
                                    $data = App\phong::find($r6->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                                    @if(in_array($r6->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r6->tenP}} ({{$r6->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r6->tenP}} ({{$r6->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r6->tenP}} ({{$r6->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r6->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms6 as $r6)
                                @php
                                    $data = App\phong::find($r6->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r6->tenP}} ({{$r6->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r6->tenP}} ({{$r6->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r6->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms7 as $r7)
                                @php
                                    $data = App\phong::find($r7->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                                    @if(in_array($r7->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r7->tenP}} ({{$r7->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r7->tenP}} ({{$r7->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r7->tenP}} ({{$r7->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r7->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms7 as $r7)
                                @php
                                    $data = App\phong::find($r7->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r7->tenP}} ({{$r7->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r7->tenP}} ({{$r7->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r7->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms8 as $r8)
                                @php
                                    $data = App\phong::find($r8->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                                    @if(in_array($r8->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r8->tenP}} ({{$r8->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r8->tenP}} ({{$r8->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r8->tenP}} ({{$r8->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r8->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms8 as $r8)
                                @php
                                    $data = App\phong::find($r8->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r8->tenP}} ({{$r8->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r8->tenP}} ({{$r8->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r8->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($arr != null)
                            @foreach ($rooms9 as $r9)
                                @php
                                    $data = App\phong::find($r9->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                                    @if(in_array($r9->id,$arr))
                                        <button style="color: yellow" class="btn btn-danger" type="button">
                                        <i class="fas fa-times">  {{$r9->tenP}} ({{$r9->loaiP}})</i>
                                    </button>
                                    @else
                                    <div class="btn-group">
                                    <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check">  {{$r9->tenP}} ({{$r9->loaiP}})</i>
                                    </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Tên phòng">Tên phòng</label>
                                                    <span class="form-control">{{$r9->tenP}} ({{$r9->loaiP}})</span>
                                                </div>
                                                @if ($countData > 0)
                                                <div class="form-group">
                                                <label for="Ghi chú">Ghi chú</label>
                                                <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                    @foreach ($data as $d)
                                                        {{$d->note}}
                                                    @endforeach
                                                </textarea>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r9->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                @php
                                            $c = App\datphong::find($idNow->id);
                                            $day_create = Carbon::parse($c->day_create);
                                            $checkMin = $now->diffInMinutes($day_create);
                                        @endphp
                                            @if($checkMin >= 4 && $day_create->isPast())
                                                </form>
                                                <a href="{{route('employee.delay',$idNow->id)}}"><button class="btn btn-success">Chọn</button></a>
                                            @else
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms9 as $r9)
                                @php
                                    $data = App\phong::find($r9->id)->ghichu()->get();
                                    $countData = count($data);
                                @endphp
                            <div class="btn-group">

                                <button style="color: yellow" type="button"class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r9->tenP}} ({{$r9->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head" style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r9->tenP}} ({{$r9->loaiP}})</span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                        <label for="Ghi chú">Ghi chú</label>
                                        <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                            @foreach ($data as $d)
                                                {{$d->note}}
                                            @endforeach
                                        </textarea>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r9->id}}">
                                        <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-4 offset-md-8">
    <a href="{{ route('employee.huy',$idNow->id) }}"><button class="btn btn-danger">Hủy</button></a>
</div>


{{--  js  --}}
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
