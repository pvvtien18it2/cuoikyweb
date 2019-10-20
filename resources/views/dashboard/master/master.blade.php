<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')</title>
    @yield('css-js')
    <style>
        *{
            margin: auto;
            padding: 0px;
        }
        #row_contend{
            background: rgba(11,34,54,0.41);
            height: 150px;
        }
        #row_show{
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row" id="row_contend">
        <p id="contend">@yield('contend')</p>
    </div>
    <div class="row" id="row_show">
        <div class="col-md-2">
            <table class="table " id="table_control">
                    @yield('table_control')
            </table>
        </div>
        <div class="col-md-10">
            <table class="table table-responsible" id="table_show">
                    @yield('table_show')
            </table>
        </div>
    </div>
</div>
</body>
</html>
