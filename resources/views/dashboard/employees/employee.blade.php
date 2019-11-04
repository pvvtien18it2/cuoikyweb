<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard For Employee</title>
    <link rel="stylesheet" href="{!! url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous') !!}">

    <link rel="stylesheet" href="{!!url('resources\dashboard\manager\css\style.css')!!}" >
</head>
<body>
<div class="container-fluid">
    <div class="row" id="row_contend">
        <p>Trang điều khiển dành cho nhân viên</p>
        <a href="{!! route('getlogout') !!}"><button class="btn btn-danger">Đăng xuất</button></a>
    </div>
    <div class="row" id="row_show">
        <div class="col-md-2">
            <table class="table " id="table_control">
                <tr>
                    <th><a href="" ><p>Quản lý phòng</p></a></th>
                </tr>
                <tr>
                    <th><a href="" ><p>Danh sách phòng trống</p></a></th>
                </tr>
                <tr>
                    <th><a href="" ><p>Danh sách phòng chưa dọn</p></a></th>
                </tr>
                <tr>
                    <th><a href="" ><p>Danh sách phòng đã đặt</p></a></th>
                </tr>
            </table>
        </div>
        <div class="col-md-10">
            <table class="table table-striped table-hover table-bordered" id="table_show">
                <tread>
                <tr>
                    <th colspan="1">Tên phòng</th>
                    <th colspan="2">Loại phòng</th>
                    <th colspan="3">Tình trạng</th>
                    <th colspan="3">Trống</th>
                    <th colspan="1">Chỉnh sửa</th>
                    <th colspan="2">Tính tiền</th>

                </tr>
                </tread>


                @foreach($rooms as $room)

                    <tr>
                        <td colspan="1">{!! $room->tenP !!}</td>
                        <td colspan="2">
                            @if ($room->loaiP =='binhdan')
                                {!! 'Bình dân' !!}
                            @elseif($room->loaiP =='thuonggia')
                                {!! 'Thương gia' !!}
                            @elseif($room->loaiP =='Vip')
                                {!! 'Vip' !!}
                            @elseif($room->loaiP =='Royal')
                                {!! 'Royal' !!}
                            @endif

                        </td>
                        <td colspan="3">
                            @if ($room->tinhtrang =='1')
                                <button class="btn btn-success" style="width: 200px; text-align: center">Đã dọn</button>
                            @else
                                <button class="btn btn-danger" style="width: 200px; text-align: center">Chưa dọn</button>
                            @endif
                        </td>
                        <td colspan="3">
                            @if ($room->trong =='1')
                                <button class="btn btn-success" style="width: 200px; text-align: center">Trống</button>
                            @else
                                <button class="btn btn-danger" style="width: 200px; text-align: center">Không trống</button>
                            @endif
                        </td>
                        <td colspan="1">
                            <a href="{!! route('employee.edit',$room->id) !!}"><button class="btn-block">Chỉnh sửa</button></a>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
</div>
</body>
</html>


