@extends('master.master_manager')
@section('title','Quản lý')
@section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection
@php
    $id = Auth::user()->id;
@endphp
@section('row_content')
<div class="col-md-9">
    <h2>Quản lý</h2>
</div>
    <div class="col-md-2">
        <a href="{!! route('manager.create') !!}"><button class="btn btn-success" style="width: 50%" id="btntrangchu">Thêm nhân viên</button></a>
    </div>
    <div class="col-md-1" >
        <a href="{!! route('getlogout') !!}"><button class="btn btn-danger" id="btntrangchu">Đăng xuất</button></a>
        <a href="{{route('employee.thongtin',$id)}}"><button class="btn btn-outline-secondary">Thông tin</button></a>
    </div>
@endsection
@section('col_control')
        <div class="row">
            <table class="table table-responsive-md table-hover table-striped" id="table_contol">
                <tr>
                    <th><b>Danh mục</b></th>
                </tr>
                <tr>
                    <th><a href="{!! route('manager.index') !!}" ><p>Quản Lý nhân viên</p></a></th>
                </tr>
                <tr>
                    <th><a href="{!! route('manager.doanhthu') !!}" ><p>Theo dõi doanh thu</p></a></th>
                </tr>
            </table>
        </div>
@endsection
@section('col_show')
    <div class="row table ">
        <div class="col-md-1" id="row_show">
            STT
        </div>
        <div class="col-md-3" id="row_show">
            Tên
        </div>
        <div class="col-md-2" id="row_show">
            Số điện thoại
        </div>
        <div class="col-md-2" id="row_show">
            Email
        </div>
        <div class="col-md-2" id="row_show">
            Xóa
        </div>
    </div>
    @php($stt=1)
    @foreach( $nhanvien as $nv )
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-1" id="col_data">
                    <p>{!! $stt++ !!}</p>
                </div>
                <div class="col-md-1" id="col_data">
                    <p>{!! $nv->name !!}</p>
                </div>
                <div class="col-md-2" id="col_data">
                    <p>{!! $nv->phone !!}</p>
                </div>
                <div class="col-md-2" id="col_data">
                    <p>{!! $nv->email !!}</p>
                </div>
                <div class="col-md-2" id="col_data_button">
                    <form action="{!! route('manager.destroy',$nv->id )!!}" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="{!! $nv->id !!}">
                        <td colspan="1"><button type="submit" class="btn btn-danger">Xoá</button></td>
                    </form>
                </div>
            </div>
    @endforeach
@endsection
