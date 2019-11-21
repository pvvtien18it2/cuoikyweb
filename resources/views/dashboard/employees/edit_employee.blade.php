<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa</title>
    <link rel="stylesheet"
        href="{!! url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous') !!}">
    <script src="{!! asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') !!}"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') !!}"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="{!! asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') !!}"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!!asset('resources\dashboard\employees\employee\style.css')!!}">
</head>
<body>
<div class="container">
        <div class="row">
                <form action="{!! route('employee.update',$data->id )!!}" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{!! $data->id !!}">
                        <table class="table table-responsive" style="border: #ff25f5 2px solid">
                            <tr>
                                <thead>
                                    <td colspan="2">Tên phòng</td>
                                    <td colspan="3">Loại phòng</td>
                                    <td colspan="3">Tinh trạnh</td>
                                    <td colspan="3">Trống</td>
                                    <td colspan="1">Hoàn thành</td>
                                </thead>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span>{!! $data->tenP !!}</span>
                                </td>
                                <td colspan="3">
                                        <span>
                                            @if ($data->loaiP =='binhdan')
                                                {!! 'Bình dân' !!}
                                            @elseif($data->loaiP =='thuonggia')
                                                {!! 'Thương gia' !!}
                                            @elseif($data->loaiP =='Vip')
                                                {!! 'Vip' !!}
                                            @elseif($data->loaiP =='Royal')
                                                {!! 'Royal' !!}
                                            @endif
                                        </span>
                                    </td>
                                    <td colspan="3">
                                            @if ($data->tinhtrang =='1')
                                                <button type="button" name="btnTinhTrang" id="btnTinhTrang" onclick="changeTinhTrang()"
                                                        class="btn btn-success" style="width: 200px; text-align: center" value="1">Đã dọn
                                                </button>
                                                <input type="hidden" value="1" id="txtTinhTrang" name="txtTinhTrang"
                                                    onclick="changeTinhTrang()">
                                            @elseif($data->tinhtrang =='0')
                                                <button type="button" name="btnTinhTrang" id="btnTinhTrang" onclick="changeTinhTrang()"
                                                        class="btn btn-danger" style="width: 200px; text-align: center">Chưa dọn
                                                </button>
                                                <input type="hidden" value="0" id="txtTinhTrang" name="txtTinhTrang"
                                                    onclick="changeTinhTrang()">
                                            @endif
                                        </td>
                                        <td colspan="3">
                                                @if ($data->trong =='1')
                                                    <button type="button" name='btnTrong' id="btnTrong" onclick="changeTrong()"
                                                            class="btn btn-success" style="width: 200px; text-align: center" value="1">Trống
                                                    </button>
                                                    <input type="hidden" value="1" id="txtTrong" name="txtTrong" onclick="changeTrong()">
                                                @elseif($data->trong =='0')
                                                    <button type="button" name='btnTrong' id="btnTrong" onclick="changeTrong()"
                                                            class="btn btn-danger" style="width: 200px; text-align: center">Không trống
                                                    </button>
                                                    <input type="hidden" value="1" id="txtTrong" name="txtTrong" onclick="changeTrong()">
                                                @endif
                                        </td>
                                        <td colspan="1">
                                            <button type="submit" class="btn btn-success">Hoàn thành</button>
                                        </td>
                            </tr>
                        </table>
                    </form>
        </div>
</div>
</body>
{{--Javascript--}}
<script>
    function changeTinhTrang() {
        if (document.getElementById('btnTinhTrang').value == 1) {
            document.getElementById('btnTinhTrang').value = 0;
            document.getElementById('txtTinhTrang').value = 0;
            document.getElementById('btnTinhTrang').className = 'btn btn-danger';
            document.getElementById('btnTinhTrang').innerHTML = 'Chưa dọn';
        } else {
            document.getElementById('btnTinhTrang').value = 1;
            document.getElementById('txtTinhTrang').value = 1;
            document.getElementById('btnTinhTrang').className = 'btn btn-success';
            document.getElementById('btnTinhTrang').innerHTML = 'Đã dọn';
        }
    }

    function changeTrong() {
        if (document.getElementById('btnTrong').value == 1) {
            document.getElementById('btnTrong').value = 0;
            document.getElementById('txtTrong').value = 0;
            document.getElementById('btnTrong').className = 'btn btn-danger';
            document.getElementById('btnTrong').innerHTML = 'Không trống';
        } else {
            document.getElementById('btnTrong').value = 1;
            document.getElementById('txtTrong').value = 1;
            document.getElementById('btnTrong').className = 'btn btn-success';
            document.getElementById('btnTrong').innerHTML = 'Trống';
        }
    }
</script>
</html>
