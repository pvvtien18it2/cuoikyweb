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
    <div class="container">
        <form action="" method="get">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <table class="table table-responsive" style="border: #ff25f5 2px solid">
                <tr>
                    <td>
                        <lable>Tên phòng</lable>
                        <span>{!! $data->tenP !!}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <lable>Loại phòng</lable>
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
                </tr>
                <tr>
                    <td>
                        <lable>Tình trạng</lable>
                        @if ($data->tinhtrang =='1')
                            <a id="btnTinhTrang" onclick="change()" class="btn btn-success" style="width: 200px; text-align: center" value="1">Clead</a>

                        @elseif($data->tinhtrang =='0')
                            <a id="btnTinhTrang" onclick="change()" class="btn btn-danger" style="width: 200px; text-align: center">Dirty</a>

                        @endif
                    </td>
                </tr>
                <tr>
                <td>
                    <lable>Trống</lable>
                </td>
                </tr>
                <tr>
                <td>
                    <lable>Dịch vụ</lable>
                </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script>
    function change() {
        if (document.getElementById('btnTinhTrang').value == 1) {
            document.getElementById('btnTinhTrang').value = 0;
            document.getElementById('btnTinhTrang').className = 'btn btn-danger';
            document.getElementById('btnTinhTrang').innerHTML = 'Dirty';
        } else {
            document.getElementById('btnTinhTrang').value = 1;
            document.getElementById('btnTinhTrang').className = 'btn btn-success';
            document.getElementById('btnTinhTrang').innerHTML = 'Clean';
        }
    }
</script>
</html>
