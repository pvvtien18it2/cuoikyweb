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
                <form action="{{route('employee.datphong',$book_room->id)}}" method="head" class="form-control-lg " style="margin: auto; width: 800px; margin-top: 50px">
                    @csrf
                    @php
                        $day_create = date('Y-m-d H:i:s',time()) ;
                    @endphp
                    <input type="hidden" name="day_create" value="{{$day_create}}">
                <div class="form-group row">
                    <label for="Tên phòng" class="col-md-5 col-form-label">Tên phòng</label>
                    <div class="col-md-7">
                        <span class="form-control">{{$book_room->tenP}} ({{$book_room->loaiP}})</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tên khách hàng" class="col-md-5 col-form-label">Tên khách hàng</label>
                    <div class="col-md-7">
                        {!! $errors->first('txtName') !!}
                        <input class="form-control " type="text" name="txtName" placeholder="Nhập đầy đủ họ tên">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Chứng minh nhân dân" class="col-md-5 col-form-label">Chứng minh nhân dân</label>
                    <div class="col-md-7">
                        {!! $errors->first('txtCMND') !!}
                        <input class="form-control " type="text" name="txtCMND" placeholder="Nhập chứng minh nhân dân tại đây">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Số người" class="col-md-5 col-form-label">Số người</label>
                    <div class="col-md-7">
                        {!! $errors->first('txtNumber') !!}
                        <input class="form-control " type="text" name="txtNumber" placeholder="Nhập số người tại đây">
                    </div>
                </div>

                <div class="row">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 70%">
                        <button type="submit" class="btn btn-primary" style="margin: auto">Hoàn tất</button>
                        <a href="{{route('employee.index')}}" class="btn btn-danger" style="margin-left: 20px">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
