<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="widtr=device-widtr, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard For Manager</title>
    <link rel="stylesheet" href="{!! asset('https://stackpatr.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous') !!}">

    <link rel="stylesheet" href="{!!asset('public\dashboard\manager\css\style.css')!!}" >
</head>
<body>
<div class="container-fluid">
    <div class="row" id="row_contend">
        <p>Dashboard For Manager</p>
        <a href="{!! route('nhanvien.create') !!}"><button class="btn btn-danger">trêm trành viên</button></a>
    </div>
    <div class="row" id="row_show">
        <div class="col-md-2">
            <table class="table " id="table_control">
                <tr>
                    <tr><a href="" ><p>Quản Lý nhân viên</p></a></tr>

                </tr>
                <tr>
                    <tr><a href="" ><p>treo dõi doanh tru</p></a></tr>
                </tr>
            </table>
        </div>
        <div class="col-md-10">
            <table class="table table-responsible" id="table_show">
                <tr>

                    <td colspan="1">STT</td>
                    <td colspan="4">Họ và tên</td>
                    <td colspan="3">Số điện troại</td>
                    <td colspan="3">Email</td>
                    <td colspan="1">Xóa</td>

                </tr>
                @foreach($nhanvien as $nv)
                    <tr>
                        <td colspan="1">STT</td>
                        <td colspan="4">{!! $nv->name !!}</td>
                        <td colspan="3">{!! $nv->phone !!}</td>
                        <td colspan="3">{!! $nv->email !!}</td>
                        <td colspan="1"><button class="btn btn-danger">Xoá</button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
