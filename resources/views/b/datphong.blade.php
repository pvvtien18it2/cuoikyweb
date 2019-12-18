<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Hoang Hon &mdash; Hotel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="{{asset('')}}">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700"
            rel="stylesheet">
        <link rel="stylesheet" href="public/fonts/icomoon/style.css">

        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/magnific-popup.css">
        <link rel="stylesheet" href="public/css/jquery-ui.css">
        <link rel="stylesheet" href="public/css/owl.carousel.min.css">
        <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="public/css/animate.css">
        {{-- <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href=" {{ asset('resources\dashboard\employees\select_room.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



        <link rel="stylesheet" href="public/fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="public/css/aos.css">

        <link rel="stylesheet" href="public/css/style.css">

    </head>

    <body>

        <div class="site-wrap">

            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div> <!-- .site-mobile-menu -->


            <div class="site-navbar-wrap js-site-navbar bg-white">

                <div class="container">
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
                                                <li class="active"><a
                                                        href="{{route('employee.bookroom.store.get.khach')}}">Đặt
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
            </div>
        </div>


        <div class="slide-one-item home-slider owl-carousel">

            <div class="site-blocks-cover overlay" style="background-image: url(public/images/hero_1.jpg);"
                data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">

                            <h1 class="mb-2">Welcome</h1>
                            <h2 class="caption">Hotel &amp; Resort</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-blocks-cover overlay" style="background-image: url(public/images/hero_2.jpg);"
                data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">
                            <h1 class="mb-2">Unique Experience</h1>
                            <h2 class="caption">Enjoy With Us</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-blocks-cover overlay" style="background-image: url(public/images/hero_3.jpg);"
                data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">
                            <h1 class="mb-2">Relaxing Room</h1>
                            <h2 class="caption">Your Room, Your Stay</h2>
                        </div>
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
                    {!! $errors->first('txtName') !!}<br>
                    {!! $errors->first('txtCMND') !!}<br>
                    {!! $errors->first('txtNumber') !!}<br>
                    {!! $errors->first('txtCallNumber') !!}<br>
                    {!! $errors->first('txtBookRoom') !!}<br>
                    {!! $errors->first('txtOutRoom') !!}<br>
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
                            <input class="form-control" type="text" name="txtCMND"
                                placeholder="Nhập số chứng minh nhân dân">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Số điện thoại" class="col-md-5 col-form-label">Số điện thoại</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="txtCallNumber"
                                placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Số khách" class="col-md-5 col-form-label">Số khách</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="txtNumber" placeholder="Nhập số người ở">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Ngày nhận phòng" class="col-md-5 col-form-label">Ngày nhận phòng</label>
                        <div class="col-md-7">
                            <input class="form-control" type="datetime-local" name="txtBookRoom">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Ngày trả phòng" class="col-md-5 col-form-label">Ngày trả phòng</label>
                        <div class="col-md-7">
                            <input class="form-control" type="datetime-local" name="txtOutRoom">
                        </div>
                    </div>
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
        <script src="public/js/jquery-3.3.1.min.js"></script>
        <script src="public/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="public/js/jquery-ui.js"></script>
        <script src="public/js/popper.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/owl.carousel.min.js"></script>
        <script src="public/js/jquery.stellar.min.js"></script>
        <script src="public/js/jquery.countdown.min.js"></script>
        <script src="public/js/jquery.magnific-popup.min.js"></script>
        <script src="public/js/bootstrap-datepicker.min.js"></script>
        <script src="public/js/aos.js"></script>


        <script src="public/js/mediaelement-and-player.min.js"></script>

        <script src="public/js/main.js"></script>


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
