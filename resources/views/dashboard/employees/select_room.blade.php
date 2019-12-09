<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chọn phòng</title>
    {{--  css  --}}
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">

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
                $arr = Array();
                $id_rooms1 = Array();
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
                //check
            @endphp
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
                    if ($dayStart >= $checkDayStart && $dayStart <= $checkDayOut){
                        $idFail = $room->phong_id;
                        array_push($arr, $idFail);
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
                @endphp
            @endforeach
                @php
                    if($arr != null){
                        $arr = array_unique($arr);
                        $arr = array_values($arr);
                    }
                        echo '<pre>';
                        print_r($arr);
                        echo '</pre>';
                @endphp
        <table class="table table-bordered table-responsive-md table-striped">
            <tr>
                <td>
                    @if ($arr != null)
                        {{--  @foreach ($arr as $a)  --}}
                            @foreach ($rooms1 as $r1)

                                    {{-- @for($i = 0 ; $i < count($arr) ; $i++) --}}
                                    {{--  @if($r1->id != $a)  --}}
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
                                                @if ($r1->ghichu != null)
                                                <div class="form-group">
                                                    <label for="Ghi chú">Ghi chú</label>
                                                    <span class="form-control">
                                                        {{$r1->ghichu}}
                                                    </span>
                                                </div>
                                                @endif
                                                <input type="hidden" name="txtphong_id" value="{{$r1->id}}">
                                                <input type="hidden" name="txtnextID" value="{{$idNow->id}}">
                                                <button type="submit" class="btn btn-success">Chọn</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                        @endforeach
                        @else
                            @foreach ($rooms1 as $r1)
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
                                        @if ($r1->ghichu != null)
                                        <div class="form-group">
                                            <label for="Ghi chú">Ghi chú</label>
                                            <span class="form-control">
                                                {{$r1->ghichu}}
                                            </span>
                                        </div>
                                        @endif
                                        <input type="hidden" name="txtphong_id" value="{{$r1->id}}">
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


{{--  js  --}}
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
