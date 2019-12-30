<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Hoang Hon &mdash; Hotel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="{{asset('')}}">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="resources/fonts/icomoon/style.css">

        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="resources/css/magnific-popup.css">
        <link rel="stylesheet" href="resources/css/jquery-ui.css">
        <link rel="stylesheet" href="resources/css/owl.carousel.min.css">
        <link rel="stylesheet" href="resources/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="resources/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="resources/css/animate.css">
        <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href=" {{ asset('resources\dashboard\employees\select_room.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


        <link rel="stylesheet" href="resources/fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="resources/css/aos.css">

        <link rel="stylesheet" href="resources/css/style.css">

    </head>

    <body>

    <div class="container-fluid" style="height: 80px ;background-color: grey"  >
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="{{route('trangchu')}}">Hoang Hon</a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">

                                <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#"
                                        class="site-menu-toggle js-menu-toggle"><span
                                            class="icon-menu h3"></span></a></div>
                                <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#"
                                        class="site-menu-toggle js-menu-toggle"><span
                                            class="icon-menu h3"></span></a></div>
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li>
                                        <a href="{{route('trangchu')}}">Trang chủ</a></li>
                                    <li><a href="{{route('sukien')}}">Sự kiện</a></li>
                                    <li class="active"><a href="{{route('employee.bookroom.store.get.khach')}}">Đặt
                                            phòng</a></li>
                                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                                </ul>
                            </div>
                    </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row table" style="padding-left: 20px">
            @php
            use Carbon\Carbon;
            $now = Carbon::now();
            $arr = Array();

            $rooms = App\datphong::all();
            $count = count($rooms);
            $people = App\phong::all();
            if(@isset($tenP)){
                $nameRoom = App\phong::all()->where('loaiP','!=',$tenP);
            }
            @endphp

            @php
            //Ngày đến và đi cần check
            $dayStartCheck =Carbon::parse($dayBookRoom);
            $dayOutCheck = Carbon::parse($dayOutRoom);
            $dayStart = $dayStartCheck->day;
            $monthStart = $dayStartCheck->month;
            $dayOut = $dayOutCheck->day;
            $monthOut = $dayOutCheck->month;
            @endphp
            {{-- check --}}
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
            if ($dayStart >= $checkDayStart || $dayStart <= $checkDayOut){ $idFail=$room->phong_id;
                array_push($arr, $idFail);
                //Ngày đi trong khoảng đã có phòng ở
                }elseif($dayOut >= $checkDayStart || $dayOut <= $checkDayOut){ $idFail=$room->phong_id;
                    array_push($arr, $idFail);
                    }
                    @endphp
                    @endforeach
                    @endif
                    @foreach ($people as $p)
                    @php
                    if($p->songuoi < $number)
                        { $idFail=$p->id;
                        array_push($arr, $idFail);
                        }
                        else{
                        $arr;
                        }
                        $dayStartRoom =Carbon::parse($dayBookRoom);
                        $check = $now->diffInHours($dayStartRoom);
                        //Chỉ cho đặt trước nữa ngày
                        if( $dayStartRoom->isFuture() && $check <= 12){ if($p->tinhtrang == 0 || $p->trong == 0 ){
                            $idFail = $p->id;
                            array_push($arr, $idFail);
                            }
                            }
                            elseif( $dayStartRoom->isFuture() && $check > 12){
                            $arr;
                            }

                            @endphp
                    @endforeach
                    @if (isset($nameRoom))
                        @foreach ($nameRoom as $t)
                            @php
                                $idFail = $t->id;
                                array_push($arr, $idFail);
                            @endphp
                        @endforeach
                    @endif
                    @php
                    if($arr != null){
                    $arr = array_unique($arr);
                    $arr = array_values($arr);
                    }
                    //echo '<pre>';
                    //print_r($nameRoom);
                    //echo '</pre>';
                    @endphp
            <h2 style="text-align: center; font-size: 60px; padding: 20px">Lựa chọn phòng phù hợp với bạn</h2>
            @php
            $tang = App\phong::max('tang');
            @endphp
            <table class="table table-bordered table-responsive-md table-striped">
                @for($i = 1 ; $i <= $tang ; $i++)
                    @php
                        $room=App\phong::all()->where('tang',$i);
                    @endphp
                    <tr>
                        @if ($arr != null)
                        @foreach ($room as $r)
                        <td>
                            @php
                            $data = App\phong::find($r->id)->ghichu()->get();
                            $countData = count($data);
                            @endphp
                            @if(in_array($r->id,$arr))
                            <button style="color: yellow" class="btn btn-danger" type="button">
                                <i class="fas fa-times"> {{$r->tenP}} ({{$r->loaiP}})</i>
                            </button>

                            @else
                            <div class="btn-group">
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check"> {{$r->tenP}} ({{$r->loaiP}})</i>
                                </button>
                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head"
                                        style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r->tenP}} ({{$r->loaiP}})</span>
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
                                        <input type="hidden" name="txtphong_id" value="{{$r->id}}">
                                        <input type="hidden" name="txtName" value="{{$name}}">
                                        <input type="hidden" name="txtCMND" value="{{$number_cmnd}}">
                                        <input type="hidden" name="txtCallNumber" value="{{$phone}}">
                                        <input type="hidden" name="txtNumber" value="{{$number}}">
                                        <input type="hidden" name="txtBookRoom" value="{{$dayBookRoom}}">
                                        <input type="hidden" name="txtOutRoom" value="{{$dayOutRoom}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </td>
                        @endforeach
                        @else
                        @foreach ($room as $r)
                        <td>
                            @php
                            $data = App\phong::find($r->id)->ghichu()->get();
                            $countData = count($data);
                            @endphp
                            <div class="btn-group">
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check"> {{$r->tenP}} ({{$r->loaiP}})</i>
                                </button>

                                <div class="dropdown-menu" style="width: 300px">
                                    <form action="{{route('employee.updatechonphong')}}" method="head"
                                        style="width: 280px ; padding: 5px">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r->tenP}} ({{$r->loaiP}})</span>
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
                                        <input type="hidden" name="txtphong_id" value="{{$r->id}}">
                                        <input type="hidden" name="txtName" value="{{$name}}">
                                        <input type="hidden" name="txtCMND" value="{{$number_cmnd}}">
                                        <input type="hidden" name="txtCallNumber" value="{{$phone}}">
                                        <input type="hidden" name="txtNumber" value="{{$number}}">
                                        <input type="hidden" name="txtBookRoom" value="{{$dayBookRoom}}">
                                        <input type="hidden" name="txtOutRoom" value="{{$dayOutRoom}}">
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        @endforeach
                        @endif
                    </tr>
                    @endfor
            </table>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-4 offset-md-8">
    <a href="{{ route('trangchu') }}"><button class="btn btn-danger">Hủy</button></a>
</div>


{{--  js  --}}
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</script>
<script src="resources/js/jquery-3.3.1.min.js"></script>
<script src="resources/js/jquery-migrate-3.0.1.min.js"></script>
<script src="resources/js/jquery-ui.js"></script>
<script src="resources/js/popper.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<script src="resources/js/owl.carousel.min.js"></script>
<script src="resources/js/jquery.stellar.min.js"></script>
<script src="resources/js/jquery.countdown.min.js"></script>
<script src="resources/js/jquery.magnific-popup.min.js"></script>
<script src="resources/js/bootstrap-datepicker.min.js"></script>
<script src="resources/js/aos.js"></script>


<script src="resources/js/mediaelement-and-player.min.js"></script>

<script src="resources/js/main.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
                    var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                    for (var i = 0; i < total; i++) {
                        new MediaElementPlayer(mediaElements[i], {
                            pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                            shimScriptAccess: 'always',
                            success: function () {
                                var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                                for (var j = 0; j < targetTotal; j++) {
                                    target[j].style.visibility = 'visible';
                                }
                        }
                    });
                    }
                });
</script>
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body>

</html>
