{{-- ID người đăng nhập
@php
    $id = Auth::user()->id;
@endphp --}}
{{-- Số lượng phòng đặt gần hẹn --}}
@php
    use Carbon\Carbon;
    $notifications = App\datphong::all();
    $count =0;
@endphp
@foreach ($notifications as $n)
    @php

        $timeOld = $n->dayBookRoom;
        $timeOld = Carbon::parse($timeOld);
        $days =  $timeOld->diffInDays(Carbon::now());
        if ($days <= 0){
            $count++;
        }
    @endphp
@endforeach


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  title  --}}
    <title>@yield('title')</title>

    {{--  css  --}}
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    @yield('css')

    {{--  font  --}}
    @yield('font')

    {{-- icon --}}
    <link href="{{url('resources/icon/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{url('resources/icon/css/brands.css')}}" rel="stylesheet">
    <link href="{{url('resources/icon/css/solid.css')}}" rel="stylesheet">

</head>
<body>
    <div class="container-fluid" style="width: 100%">
        <div class="row" id="row_content" style="width: 100%">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%">
            <a class="navbar-brand" href="{!!route('employee.index')!!}">@yield('logo')</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-md-2 offset-md-10">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a href="{{route('employee.bookroom.store.get')}}"><button class="btn btn-outline-success mr-sm-2">Đặt phòng</button></a>
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" class="my-2 my-sm-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-id-card" style="size: 30px"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @php
                            if(Auth::check()){
                                $id = Auth::user()->id;
                            }
                        @endphp
                        <a href="{{route('employee.thongtin',$id)}}"><button class="btn btn-outline-secondary" style="margin: auto ; width: 160px">Thông tin</button></a>
                        <a href="{!! route('getlogout') !!}"><button class="btn btn-outline-danger" style="margin: auto ; width: 160px">Đăng xuất</button></a>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" id="row_show">
            <div class="col-md-2">
                @yield('col_contend')
            </div>
            <div class="col-md-10">
                @yield('col_show')
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('resources/js/app.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.min.js') }}"></script> --}}
    @yield('js')
</body>
