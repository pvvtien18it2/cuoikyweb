<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  title  --}}
    <title>Dịch vụ</title>

    {{--  css  --}}
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <style>
        form{
            margin: auto;
            padding-top: 20px;
        }
    </style>




</head>
<body>
<div class="container">
    <div class="row">
            <form action=" {{route('dichvu.store',$id->id)}}" method="head">
                    @csrf
                    <input type="hidden" name="idP" value="{{$id->id}}">

                    <table class="table table-striped table-hover table-bordered  table-responsive-md"
                    style="width: 100%">
                    <thead>
                    <tr>
                        <td colspan="3">Tên dịch vụ</td>
                        <td colspan="2">Giá tiền</td>
                        <td colspan="2">Loại</td>
                        <td colspan="1">Số lượng</td>
                    </tr>
                    </thead>
                    @php($themDichVu = DB::table('cacloaidichvu')->get())
                    @foreach($themDichVu as $dv)
                        <tr>
                            <td colspan="3">
                                @if ($dv->tenDV =='nuocsuoi')
                                    {!! 'Nước suối' !!}
                                @elseif($dv->tenDV=='coca')
                                    {!! 'Coca' !!}
                                @elseif($dv->tenDV=='pepsi')
                                    {!! 'Pepsi' !!}
                                @elseif($dv->tenDV=='bohuc')
                                    {!! 'Bò húc' !!}
                                @elseif($dv->tenDV=='biasaigon')
                                    {!! 'Bia sài gòn' !!}
                                @elseif($dv->tenDV=='biaheineken')
                                    {!! 'Bia Heineken' !!}
                                @elseif($dv->tenDV=='biacorona')
                                    {!! 'Bia Corona' !!}
                                @elseif($dv->tenDV=='craven')
                                    {!! 'Thuốc lá Craven' !!}
                                @elseif($dv->tenDV=='baso')
                                    {!! 'Thuốc lá 555' !!}
                                @elseif($dv->tenDV=='anuong')
                                    {!! 'Ăn uống' !!}
                                @elseif($dv->tenDV=='combo1')
                                    {!! 'Combo 1' !!}
                                @elseif($dv->tenDV=='combo2')
                                    {!! 'Combo 2' !!}
                                @elseif($dv->tenDV=='combo3')
                                    {!! 'Combo 3' !!}
                                @elseif($dv->tenDV=='combo4')
                                    {!! 'Combo 4' !!}
                                @endif
                            </td>
                            <td colspan="2">
                                {!! number_format($dv->giaDV) !!}
                                <input type="hidden" value="{!! $dv->giaDV !!}" name="{!! 'hidden_gia_'.$dv->id !!}">
                            </td>
                            <td colspan="2">
                                @if ($dv->loai =='Chai')
                                    {!! 'Chai' !!}
                                @elseif($dv->loai=='Lon')
                                    {!! 'Lon' !!}
                                @elseif($dv->loai=='Goi')
                                    {!! 'Gói' !!}
                                @elseif($dv->loai=='Lan')
                                    {!! 'Lần' !!}
                                @elseif($dv->loai=='Ngay')
                                    {!! 'Ngày' !!}
                                @endif
                            </td>
                            <td colspan="1"><input type="number" value="0" name="{!! 'hidden_sl_'.$dv->id !!}"></td>
                        </tr>
                    @endforeach

                    </table>
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-left:10%">
                        <button type="submit" class="btn btn-success" style=" text-align: center; width: 30% ; margin-left: 30%">Thêm dịch vụ</button>
                        <a href="{{route('employee.quanly')}}" class="btn btn-danger" style="margin-left: 20px">Hủy</a>
                    </div>

                    </form>
    </div>
</div>

    {{--  script  --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
