@extends('master.employee')
@section('title','Thuê phòng')
@section('logo','QUản lý')
@section('css')
{{-- <link rel="stylesheet" href=" {{ url('resources/dashboard/style.css') }}"> --}}
@endsection
@section('col_contend')
@include('master.include.manager_col_contend')
@endsection

@section('col_show')



<div class="row table" style="padding-left: 20px">
    @php
    $rooms = App\phong::all();
    $sumDV = 0;
    $sumP = 0;
    $rooms1 = DB::table('phong')->where('tang',1)->get();
    $rooms2 = DB::table('phong')->where('tang',2)->get();
    $rooms3 = DB::table('phong')->where('tang',3)->get();
    $rooms4 = DB::table('phong')->where('tang',4)->get();
    $rooms5 = DB::table('phong')->where('tang',5)->get();
    $rooms6 = DB::table('phong')->where('tang',6)->get();
    $rooms7 = DB::table('phong')->where('tang',7)->get();
    $rooms8 = DB::table('phong')->where('tang',8)->get();
    $rooms9 = DB::table('phong')->where('tang',9)->get();
    @endphp
    @foreach ($rooms as $r)
    @php
    $sumP +=$r->countPhong;
    $sumDV += $r->countDichVu;
    @endphp
    @endforeach
    <div class="row" style=" margin: 10px auto ; ">
        <div class="col-md-6">
            <div class="jumbotron" style="width: 700px; height: 300px">
                <p class="display-4">Tổng doanh thu phòng</p>
                <hr class="my-4">
                {{number_format($sumP)}} đ
                <hr class="my-2">
                <a class="btn btn-primary btn-lg" href="{{route('manager.doanhthuphong')}}" role="button">Chi tiết</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron" style="width: 700px; height: 300px">
                <p class="display-4">Tổng doanh thu dịch vụ</p>
                <hr class="my-4">
                {{number_format($sumDV)}} đ
                <hr class="my-2">
                <a class="btn btn-primary btn-lg" href="{{route('manager.doanhthudichvu')}}" role="button">Chi tiết</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive-md table-striped">
        <tr>
            @foreach ($rooms1 as $r1)
            <td>
                @php
                $count = $r1->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r1->tenP}}
                    ({{$r1->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r1->tenP}} ({{$r1->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms2 as $r2)
            <td>
                @php
                $count = $r2->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r2->tenP}}
                    ({{$r2->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r2->tenP}} ({{$r2->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms3 as $r3)
            <td>
                @php
                $count = $r3->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r3->tenP}}
                    ({{$r3->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r3->tenP}} ({{$r3->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms4 as $r4)
            <td>
                @php
                $count = $r4->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r4->tenP}}
                    ({{$r4->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r4->tenP}} ({{$r4->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms4 as $r4)
            <td>
                @php
                $count = $r4->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r4->tenP}}
                    ({{$r4->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r4->tenP}} ({{$r4->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms5 as $r5)
            <td>
                @php
                $count = $r5->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r5->tenP}}
                    ({{$r5->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r5->tenP}} ({{$r5->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms6 as $r6)
            <td>
                @php
                $count = $r6->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r6->tenP}}
                    ({{$r6->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r6->tenP}} ({{$r6->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms7 as $r7)
            <td>
                @php
                $count = $r7->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r7->tenP}}
                    ({{$r7->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r7->tenP}} ({{$r7->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms8 as $r8)
            <td>
                @php
                $count = $r8->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r8->tenP}}
                    ({{$r8->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r8->tenP}} ({{$r8->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($rooms9 as $r9)
            <td>
                @php
                $count = $r9->countDichVu;
                @endphp
                @if ($count > 0)
                <span style="background-color: greenyellow">{{$r9->tenP}}
                    ({{$r9->loaiP}})<br />{{number_format($count)}} đ</span>
                @else
                <span>{{$r9->tenP}} ({{$r9->loaiP}})<br />{{number_format($count)}} đ</span>
                @endif
            </td>
            @endforeach
        </tr>
    </table>
</div>
@endsection
