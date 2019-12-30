<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <title>Đặt phòng</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 style="text-align: center; margin: 20px auto; font-size: 50px">Đặt phòng</h2>
        </div>
        @php
            use Carbon\Carbon;
        @endphp
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
            <form action="{{route('employee.bookroom.store')}}" method="post" class="form-control-lg " style="margin: auto; width: 800px; margin-top: 45px">
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
                        <input class="form-control" type="number"  name="txtCMND" placeholder="Nhập số chứng minh nhân dân">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Số điện thoại" class="col-md-5 col-form-label">Số điện thoại</label>
                    <div class="col-md-7">
                        <input class="form-control" type="number" name="txtCallNumber" placeholder="Nhập số điện thoại">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Số khách" class="col-md-5 col-form-label">Số khách</label>
                    <div class="col-md-7">
                        <input class="form-control" type="number" name="txtNumber" placeholder="Nhập số người ở">
                    </div>
                </div>
                @php
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
                <div class="row">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 70%">
                        <button class="btn btn-success" type="submit">Hoàn thành</button>
                        @if(Auth::check() == 1)
                        <a href="{{route('employee.index')}}" class="btn btn-danger" style="margin-left: 20px">Hủy</a>
                        @else
                        <a href="{{route('trangchu')}}" style="margin-left: 20px" class="btn btn-danger">Trở lại</a>
                        @endif

                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
