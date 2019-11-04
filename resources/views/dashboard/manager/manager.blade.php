<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard For Manager</title>
    <link rel="stylesheet" href="{!! url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous') !!}">

    <link rel="stylesheet" href="{!!url('resources\dashboard\manager\css\style.css')!!}" >
</head>
<body>
<div class="container-fluid">
    <div class="row" id="row_contend">
        <p>Trang điều khiển dành cho quản lý</p>
        <a href="{!! route('manager.create') !!}"><button class="btn btn-danger">Thêm trành viên</button></a>
        <a href="{!! route('getlogout') !!}"><button class="btn btn-danger">Đăng xuất</button></a>
    </div>
    <div class="row" id="row_show">
        <div id="show_row_col-md-2" class="col-md-2">
            <table class="table " id="table_control" >
                <tr>
                    <th><a href="{!! route('manager.index') !!}" ><p>Quản Lý nhân viên</p></a></th>

                </tr>
                <tr>
                    <th><a href="" ><p>Theo dõi doanh thu</p></a></th>
                </tr>
            </table>
        </div>
        <div id="show_row_col-md-10" class="col-md-10" >
            <table class="table table-striped table-hover table-bordered" id="table_show" >
                <tread>
                <tr>
                    <th colspan="1">STT</th>
                    <th colspan="4">Tên</th>
                    <th colspan="3">Số điện troại</th>
                    <th colspan="3">Email</th>
                    <th colspan="1">Xóa</th>
                </tr>
                </tread>
                @php($stt=0)
                @foreach( $nhanvien as $nv )
                    @php($stt+=1)
                    <tr>
                        <td colspan="1">{!! $stt !!}</td>
                        <td colspan="4">{!! $nv->name !!}</td>
                        <td colspan="3">{!! $nv->phone !!}</td>
                        <td colspan="3">{!! $nv->email !!}</td>
                        <form action="{!! route('manager.destroy',$nv->id )!!}" metrod="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="_metrod" value="DELETE">
                            <input type="hidden" name="id" value="{!! $nv->id !!}">
                            <td colspan="1"><button type="submit" class="btn btn-danger">Xoá</button></td>
                        </form>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
