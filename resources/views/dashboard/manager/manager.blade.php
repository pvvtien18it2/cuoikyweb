@extends('master.employee')
@section('title','Thuê phòng')
@section('logo','QUản lý')
@section('css')
    {{-- <link rel="stylesheet" href=" {{ url('resources/dashboard/style.css') }}"> --}}
@endsection
@section('col_contend')
    @include('master.include.manager_col_contend')
@endsection

{{-- @section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection --}}

@section('col_show')
    <table class="table">
        <thead>
            <tr>
            <th scope="col" colspan="1">STT</th>
            <th scope="col" colspan="3">Tên</th>
            <th scope="col" colspan="3">Số điện thoại</th>
            <th scope="col" colspan="3">Email</th>
            <th scope="col" colspan="2">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @php($stt=1)
            @foreach( $nhanvien as $nv )
                <tr>
                    <th scope="row" colspan="1">{!! $stt++ !!}</th>
                    <td colspan="3">{!! $nv->name !!}</td>
                    <td colspan="3">{!! $nv->phone !!}</td>
                    <td colspan="3">{!! $nv->email !!}</td>
                    <td colspan="2">
                        <form action="{!! route('manager.destroy',$nv->id )!!}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{!! $nv->id !!}">
                            <button type="submit" class="btn btn-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
