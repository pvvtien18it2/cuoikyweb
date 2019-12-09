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
            <table class="table table-bordered table-hover">
                <thead>
                    <td colspan="1">STT</td>
                    <td colspan="3">Tên khách hàng</td>
                    <td colspan="2">Số CMND</td>
                    <td colspan="2">Số điện thoại</td>
                    <td colspan="2">Số người ở</td>
                    <td colspan="2">Thời gian tới hẹn</td>
                </thead>
                @php

                $stt = 1;
                $offsets = Array();
                $count = 0;
                @endphp
                @foreach ($check as $c)
                    @php
                    $timeOld = $c->dayBookRoom;
                    $timeOld = Carbon::parse($timeOld);
                    $days =  $timeOld->diffInDays($now);
                    $times = $timeOld->diffInHours($now);
                    array_push($offsets, $times);
                    asort($offsets);
                    if ($days <= 2){
                        $count++;
                    }
                    @endphp

                @endforeach
                @foreach($offsets as $offset)
                    @foreach ($check as $c)
                    @php
                    $timeOld = Carbon::parse($timeOld);
                    $days =  $timeOld->diffInDays($now);
                    $times = $timeOld->diffInHours($now);
                    @endphp
                    @if ($times==$offset)
                        @if ($days <= 0)
                            @if($now->isToday($timeOld) && $timeOld->isPast())
                                @php
                                    $delete =  datphong::find($c->id);
                                    $delete->delete();
                                @endphp
                            @else
                            <tr>
                                <td style="background-color: crimson" colspan="1">{{$stt++}}</td>
                                <td style="background-color: crimson" colspan="3">{{$c->name}}</td>
                                <td style="background-color: crimson" colspan="2">{{$c->number_cmnd}}</td>
                                <td style="background-color: crimson" colspan="2">{{$c->phone}}</td>
                                <td style="background-color: crimson" colspan="2">{{$c->people}}</td>
                                <td style="background-color: crimson" colspan="2">{{$c->dayBookRoom}}</td>
                            </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="1">{{$stt++}}</td>
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
        <div class="row">
            <div class="col-md-5 offset-md-5">
                <a href="{{ url()->previous() }}"><button class="btn btn-danger">Trở lại</button></a>
            </div>
        </div>
    </div>
</body>
</html>
