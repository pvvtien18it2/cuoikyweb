@extends('master.master_employee')
@section('title','Phòng dọn')
@section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection
@section('row_content')
<div class="col-md-10">
    <h2>Nhân viên</h2>
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
            Tình trạng
        </div>
        <div class="col-md-2" id="row_show">
            Chỉnh sửa
        </div>
    </div>
    @foreach ($clean_rooms as $room)
        <div class="row table " >
            <div class="col-md-1" id="col_data">
                <p>
                    {!! $room->tenP !!}
                </p>
            </div>
            <div class="col-md-1" id="col_data">
                <p>
                    @if ($room->loaiP =='Popularly')
                    {!! 'Popularly' !!}
                @elseif($room->loaiP =='
Trader')
                    {!! '
Trader' !!}
                @elseif($room->loaiP =='Vip')
                    {!! 'Vip' !!}
                @elseif($room->loaiP =='Royal')
                    {!! 'Royal' !!}
                @endif
                </p>
            </div>
            <div class="col-md-2" id="col_data_button">
                @if ($room->tinhtrang =='1')
                    <button class="btn btn-success" >Đã dọn</button>
                @else
                    <button class="btn btn-danger" >Chưa dọn</button>
                @endif
            </div>
            <div class="col-md-2" id="col_data_button">
                <a href="{!! route('employee.edit_clean_room',$room->id) !!}"><button class="btn btn-success">Chỉnh sửa</button></a>
            </div>

        </div>


    @endforeach
@endsection
