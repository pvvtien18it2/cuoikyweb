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
    <div class="row" id="row_show">
        <div id="show_row_col-md-2" class="col-md-2">
            @yield('col_control')
        </div>
        <div id="show_row_col-md-10" class="col-md-10" >
            @yield('col_show')
        </div>
    </div>
</div>


    {{--  script  --}}
    <script src="{{ asset('resources/js/app.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.min.js') }}"></script>
    @yield('js')
</body>
</html>
