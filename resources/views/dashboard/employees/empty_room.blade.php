@extends('master.master_employee')
@section('title','Phòng trống')
@section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection
@section('row_content')
    <div class="col-md-10">
        <h2>Quản lý phòng trống</h2>
    </div>
    <div class="col-md-2">
            <a href="{!! route('getlogout') !!}"><button class="btn btn-danger" id="btndangxuat">Đăng xuất</button></a>
    </div>
@endsection
@section('col_show')
@if (session('mess'))
    <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('mess') }}
    </div>
@endif
@if (session('status'))
<div class="alert alert-info alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    {!! session('status') !!}
</div>
@endif
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
            Đặt phòng
        </div>
    </div>
    @foreach ($empty_rooms as $room)
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
                {{--  <a href="{!! route('employee.edit_empty_room',$room->id) !!}"><button class="btn btn-success">Chỉnh sửa</button></a>  --}}
                        <form action="{{route('employee.datphong',$room->id)}}" method="head">
                                @csrf
                                <button type="submit" class="btn btn-primary">Đặt phòng</<button>
                        </form>
            </div>
            {{--  <div class="col-md-2" id="col_data_button">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Đặt phòng</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đặt phòng</h5>
                        </div>
                        <form action="{{route('employee.datphong')}}" method="head">
                            @csrf
                            <input type="hidden" value="{{$room->id}}" name="idP">
                            <div class="modal-body">
                                <div class="alert-danger">
                                    <Strong>Bạn có muốn chắc mình muốn thuê phòng: {{$room->tenP}}</Strong>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    </div>
            </div>  --}}
        </div>
    @endforeach
@endsection
