<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Hoang Hon &mdash; Hotel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="{{asset('')}}">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700"
            rel="stylesheet">
        <link rel="stylesheet" href="resources/fonts/icomoon/style.css">

        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="resources/css/magnific-popup.css">
        <link rel="stylesheet" href="resources/css/jquery-ui.css">
        <link rel="stylesheet" href="resources/css/owl.carousel.min.css">
        <link rel="stylesheet" href="resources/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="resources/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="resources/css/animate.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



        <link rel="stylesheet" href="resources/fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="resources/css/aos.css">

        <link rel="stylesheet" href="resources/css/style.css">

    </head>

    <body>

        <div class="container-fluid" style="height: 80px ;background-color: grey">
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
                                            class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#"
                                            class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
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
                <h2 style="text-align: center; margin: 20px auto; font-size: 50px">Đặt phòng</h2>
            </div>
            @if (session('noteBookRoom'))
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('noteBookRoom') }}
            </div>
            @endif
            @if (session('note'))
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('note') }}
            </div>
            @endif
            @if (session('notepeople'))
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('notepeople') }}
            </div>
            @endif
            @if (session('mess'))
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('mess') }}
            </div>
            @endif
            @if (session('minpeople'))
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('minpeople') }}
            </div>
            @endif
            {{-- Errors --}}
            @if(count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: left">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="col-md-7 offset-md-5">
                    @if ($errors->first('txtName'))
                        {!! $errors->first('txtName') !!}<br>
                    @elseif($errors->first('txtCMND'))
                        {!! $errors->first('txtCMND') !!}<br>
                    @elseif($errors->first('txtNumber'))
                        {!! $errors->first('txtNumber') !!}<br>
                    @elseif($errors->first('txtCallNumber'))
                        {!! $errors->first('txtCallNumber') !!}<br>
                    @elseif($errors->first('txtBookRoom'))
                        {!! $errors->first('txtBookRoom') !!}<br>
                    @elseif($errors->first('txtOutRoom'))
                        {!! $errors->first('txtOutRoom') !!}<br>
                    @endif
                </div>
            </div>
            @endif

            <div class="row">
                <form action="{{route('employee.bookroom.store.khach')}}" method="post" class="form-control-lg "
                    style="margin: auto; width: 800px; margin-top: 45px; padding-bottom: 600px;">
                    @csrf
                    <div class="form-group row">
                        <label for="Tên khách hàng" class="col-md-5 col-form-label">Tên khách hàng</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="txtName" placeholder="Nhập tên của bạn">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Chứng minh nhân dân" class="col-md-5 col-form-label">Chứng minh nhân dân</label>
                        <div class="col-md-7">
                            <input class="form-control" type="number"  name="txtCMND"
                                placeholder="Nhập số chứng minh nhân dân">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Số điện thoại" class="col-md-5 col-form-label">Số điện thoại</label>
                        <div class="col-md-7">
                            <input class="form-control" type="number" name="txtCallNumber"
                                placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Số khách" class="col-md-5 col-form-label">Số khách</label>
                        <div class="col-md-7">
                        @if (isset($number))
                            <input class="form-control" type="text" name="txtNumber" readonly='false' value="{{$number}}">
                        @else
                            <input class="form-control" type="number" name="txtNumber" placeholder="Vui lòng nhập số người ở">
                        @endif
                        </div>
                    </div>
                    @php
                    use Carbon\Carbon;
                    $noonToday = Carbon::parse('noon today');
                    $noonToday->addHour(12);
                    if($noonToday->isPast()){
                    $noonToday = Carbon::tomorrow();
                    $noonToday->addHour(12);
                    $noonTomorrow = Carbon::tomorrow()->addDay(1);
                    $noonTomorrow->addHour(12);
                    }
                    else{
                    $noonTomorrow = Carbon::tomorrow();
                    $noonTomorrow->addHour(12);
                    }

                    $noonToday = $noonToday->format("Y-m-d\TH:i:s");
                    $noonTomorrow = $noonTomorrow->format("Y-m-d\TH:i:s");
                    @endphp
                    <div class="form-group row">
                        <label for="Ngày nhận phòng" class="col-md-5 col-form-label">Ngày nhận phòng</label>
                        <div class="col-md-7">
                            <input class="form-control" type="datetime-local" name="txtBookRoom" value={{$noonToday}}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Ngày trả phòng" class="col-md-5 col-form-label">Ngày trả phòng</label>
                        <div class="col-md-7">
                            <input class="form-control" type="datetime-local" name="txtOutRoom" value={{$noonTomorrow}}>
                        </div>
                    </div>
                    <input type="hidden" name="tenP" value="{{$tenP}}">
                    <div class="row">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 70%">
                            <button class="btn btn-success" type="submit">Hoàn thành</button>
                            @if(Auth::check())
                            <a href="{{route('employee.index')}}" class="btn btn-danger" style="margin-left: 20px">Hủy</a>
                            @else
                            <a href="{{route('trangchu')}}" style="margin-left: 20px" class="btn btn-danger">Hủy</a>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>


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
