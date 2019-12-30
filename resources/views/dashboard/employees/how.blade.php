<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- css  --}}
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @php
        $tang = App\phong::max('tang');
        echo $tang;
    @endphp

    <table class="table table-bordered table-responsive-md table-striped">
        @for($i = 1 ; $i <= $tang ; $i++)
            @php
                $rooms = App\phong::all()->where('tang',$i);
            @endphp
            <tr>
                @foreach ($rooms as $r)
                <td>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$r->tenP}}
                        </button>
                        <div class="dropdown-menu">
                            {{$r->id}}
                        </div>
                    </div>
                </td>
                @endforeach
            </tr>
        @endfor
    </table>

    <script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>
