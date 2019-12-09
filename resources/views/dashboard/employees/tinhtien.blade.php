@extends('master.master_employee')
@section('title','Phòng trống')
@section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection
@section('row_content')
    <div class="col-md-10">
        <h2>Tính tiền</h2>
    </div>
    <div class="col-md-2">
            <a href="{!! route('getlogout') !!}"><button class="btn btn-danger" id="btndangxuat">Đăng xuất</button></a>
    </div>
@endsection
@section('col_show')
    <div class="row table ">
        <div class="col-md-1" id="row_show">
            Tên phòng
        </div>
        <div class="col-md-1" id="row_show">
            Loại phòng
        </div>
        <div class="col-md-2" id="row_show">
            Tiền dịch vụ
        </div>
        <div class="col-md-2" id="row_show">
            Tính tiền
        </div>
    </div>
    @foreach ($rooms as $room)
        <div class="row table " >
            <div class="col-md-1" id="col_data">
                    {!! $room->tenP !!}
            </div>
            <div class="col-md-1" id="col_data">
                {{$room->loaiP}}
            </div>

            <div class="col-md-2" id="col_data_button">
                {{--  -----------------Tinh tien dich vu---------------------  --}}
                @php
                    $tongdichvu = 0;
                    $dvs = App\phong::find($room->id)->dichvu()->get();
                    foreach ($dvs as $dv){
                        $tongdichvu += $dv->tongdichvu;
                    }
                @endphp
                {{number_format($tongdichvu)}}

            </div>
            <div class="col-md-2" id="col_data_button">
                    <form action="{{route('employee.thanhtoan',$room->id)}}" method="head">
                            @csrf
                            <input type="hidden"  name="tongDichVu" value="{!!$tongdichvu!!}">
                            <button type="submit" class="btn btn-primary">Tính tiền</button>
                    </form>
            </div>
        </div>
    @endforeach
@endsection
