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

</head>
<body>
<div class="container-fluid">
    <div class="row" id="row_content">
        @yield('row_content')
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="row_show">
    <div id="show_row_col-md-2" class="col-md-2">
            <table class="table table-responsive-md table-hover table-striped" id="table_contol">
                    <tr>
                        <th><b>Danh mục</b></th>
                    </tr>
                    <tr>
                        <th><a href="{!!route('employee.index')!!}" ><p>Danh sách phòng trống</p></a></th>
                    </tr>
                    <tr>
                        <th><a href="{!!route('employee.tinhtien')!!}" ><p>Tính tiền</p></a></th>
                    </tr>
                    <tr>
                        <th><a href="{!!route('employee.quanly')!!}" ><p>Quản lý phòng</p></a></th>
                    </tr>
                    <tr>
                        <th><a href="{!!route('employee.tinhtrang')!!}" ><p>Danh sách phòng chưa dọn</p></a></th>
                    </tr>
                    <tr>
                        <th><a href="" ><p>Danh sách phòng đã đặt</p></a></th>
                    </tr>
            </table>
    </div>
    <div id="show_row_col-md-10" class="col-md-10" >
        @yield('col_show')
    </div>
    </div>
</div>


    {{--  script  --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
