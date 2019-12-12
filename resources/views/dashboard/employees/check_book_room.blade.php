<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <title>Đặt lịch</title>
</head>
<body>
    @php
    use Carbon\Carbon;
    use App\datphong;
    $now = Carbon::now();
    @endphp
    <div class="container">
        <div class="row">
            <h2 style="text-align: center ; font-size: 70px ; padding: 20px; margin: auto">Danh sách đặt phòng trước</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <td colspan="1">STT</td>
                    <td colspan="1">Phòng</td>
                    <td colspan="3">Tên khách hàng</td>
                    <td colspan="2">Số CMND</td>
                    <td colspan="2">Số điện thoại</td>
                    <td colspan="2">Số người ở</td>
                    <td colspan="2">Thời gian tới hẹn</td>
                </thead>
                @php

                $stt = 1;
                $offsets = array();
                $arr_phong_id = array();
                $arr_id = array();
                $arr = array();
                @endphp
                @foreach ($check as $c)
                    @php
                    $timeOld = $c->dayBookRoom;
                    $timeOld = Carbon::parse($timeOld);
                    $days =  $timeOld->diffInDays($now);
                    $times = $timeOld->diffInHours($now);
                    array_push($offsets, $times);
                    asort($offsets);
                    @endphp

                @endforeach
                @foreach($offsets as $offset)
                    @foreach ($check as $c)
                    @php
                    $timeOld = $c->dayBookRoom;
                    $timeOld = Carbon::parse($timeOld);
                    $days =  $timeOld->diffInDays($now);
                    $times = $timeOld->diffInHours($now);
                    @endphp
                        @if ($times == $offset)
                            @php
                                array_push($arr_phong_id, $c->phong_id);
                                array_push($arr_id, $c->id);
                                $arr = array_combine($arr_id, $arr_phong_id);
                            @endphp
                        @else
                            @php
                                $arr_phong_id;
                                $arr_id;
                                $arr;
                            @endphp
                        @endif
                        @endforeach
                    @endforeach
                    @php

                //echo '<pre>';
                //print_r($arr);
                //echo '</pre>';
            @endphp
                    @foreach ($check as $c)
                            @php
                                $timeOld = $c->dayBookRoom;
                                $timeOld = Carbon::parse($timeOld);
                                $days =  $timeOld->diffInDays($now);
                                $times = $timeOld->diffInHours($now);
                            @endphp
                        @if ($days < 0)
                            @if($now->isToday($timeOld) && $timeOld->isPast())
                                @php
                                    $delete =  datphong::find($c->id);
                                    $delete->delete();
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @foreach($offsets as $offset)
                    @foreach ($check as $c)
                        @php
                            $timeOld = $c->dayBookRoom;
                            $timeOld = Carbon::parse($timeOld);
                            $days =  $timeOld->diffInDays($now);
                            $times = $timeOld->diffInHours($now);
                        @endphp
                        @if( $offset == $times)
                        @if(in_array($c->phong_id , $arr) && in_array($times , $offsets) && $days < 1 )
                            @php
                                $id = array_search($c->phong_id , $arr);
                                $room = App\phong::find($c->phong_id)->datphong()->where('id',$id)->first();
                                $number_room = App\Phong::find($c->phong_id);
                            @endphp
                            <tr>
                                <td style="background-color: crimson" colspan="1">{{$stt++}}</td>
                                <td style="background-color: crimson" colspan="1">{{$number_room->tenP}}</td>
                                <td style="background-color: crimson" colspan="3">{{$room->name}}</td>
                                <td style="background-color: crimson" colspan="2">{{$room->number_cmnd}}</td>
                                <td style="background-color: crimson" colspan="2">{{$room->phone}}</td>
                                <td style="background-color: crimson" colspan="2">{{$room->people}}</td>
                                <td style="background-color: crimson" colspan="2">{{$room->dayBookRoom}}</td>
                            </tr>
                        @else
                            <tr>
                                @php
                                    $number_room = App\Phong::find($c->phong_id);
                                @endphp
                                <td colspan="1">{{$stt++}}</td>
                                <td colspan="1">{{$number_room->tenP}}</td>
                                <td colspan="3">{{$c->name}}</td>
                                <td colspan="2">{{$c->number_cmnd}}</td>
                                <td colspan="2">{{$c->phone}}</td>
                                <td colspan="2">{{$c->people}}</td>
                                <td colspan="2">{{$c->dayBookRoom}}</td>
                            </tr>
                        @endif
                        @endif
                    @endforeach
                @endforeach
            </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 offset-md-5">
                <a href="{{ url()->previous() }}"><button class="btn btn-danger">Trở lại</button></a>
            </div>
        </div>
    </div>
</body>
</html>
