<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard For Manager</title>
    <link rel="stylesheet" href="{!! url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous') !!}">
    <script src="{!! asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') !!}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') !!}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{!! asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') !!}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!!url('resources\dashboard\manager\css\style.css')!!}" >
</head>
<body>
<div class="container-fluid">
    <div class="row" id="row_contend" >
{{--        style="height: 60%;"--}}
        <div class="col-md-10">
            <h2>  Trang điều khiển dành cho quản lý</h2>
{{--            style="font-size: 500%;text-align: center"--}}
        </div>
        <div class="col-md-1" id="row_contend_col">
            <a href="{!! route('manager.create') !!}"><button class="btn btn-danger" >Thêm nhân viên</button></a>
        </div>
{{--        style="width: 110%"--}}
        <div class="col-md-1" id="row_contend_col">
            <a href="{!! route('getlogout') !!}"><button class="btn btn-danger" >Đăng xuất</button></a>
{{--            style="width: 110%"--}}
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="row_show">
        <div id="show_row_col-md-2" class="col-md-2" style="position: absolute ;top:21%;">
            <table class="table " id="table_control" >
                <tr>
                    <th><a href="{!! route('manager.index') !!}" ><p>Quản Lý nhân viên</p></a></th>

                </tr>
                <tr>
                    <th><a href="" ><p>Theo dõi doanh thu</p></a></th>
                </tr>
            </table>
        </div>
        <div id="show_row_col-md-10" class="col-md-10" style="   position: absolute ;left:16%;">
            <table class="table table-striped table-hover table-bordered" id="table_show" >
                <tread>
                <tr>
                    <th colspan="1">STT</th>
                    <th colspan="4">Tên</th>
                    <th colspan="3">Số điện thoại</th>
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
