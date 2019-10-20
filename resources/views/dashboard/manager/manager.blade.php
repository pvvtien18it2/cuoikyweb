@extends('dashboard.master.master')
@section('title','Dashboard For Manager')
@section('contend','Dashboard For Manager')
@section('css-js')
    <link rel="stylesheet" href="{!! url('resources\dashboard\manager\css\style.css') !!}">
@endsection
@section('table_control')
    <tr>
        <th><a href="" ><p>Quản Lý nhân viên</p></a></th>

    </tr>
    <tr>
        <th><a href="" ><p>Theo dõi doanh thu</p></a></th>
    </tr>

@endsection
@section('table_show')
    <tr>
        <th>
            <td>Họ và tên</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Xóa</td>
        </th>
    </tr>
@endsection
