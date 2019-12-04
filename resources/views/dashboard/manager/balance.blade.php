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


        <div class="row table" style="padding-left: 20px">
                @php
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

                <table class="table table-bordered table-responsive-md table-striped"  >
                        <tr>
                            @foreach ($rooms1 as $r1)
                                <td>
                                    @php
                                        $count = $r1->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r1->tenP}} ({{$r1->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r1->tenP}} ({{$r1->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms2 as $r2)
                                <td>
                                    @php
                                        $count = $r2->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r2->tenP}} ({{$r2->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r2->tenP}} ({{$r2->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms3 as $r3)
                                <td>
                                    @php
                                        $count = $r3->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r3->tenP}} ({{$r3->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r3->tenP}} ({{$r3->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms4 as $r4)
                                <td>
                                    @php
                                        $count = $r4->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r4->tenP}} ({{$r4->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r4->tenP}} ({{$r4->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms4 as $r4)
                                <td>
                                    @php
                                        $count = $r4->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r4->tenP}} ({{$r4->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r4->tenP}} ({{$r4->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms5 as $r5)
                                <td>
                                    @php
                                        $count = $r5->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r5->tenP}} ({{$r5->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r5->tenP}} ({{$r5->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms6 as $r6)
                                <td>
                                    @php
                                        $count = $r6->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r6->tenP}} ({{$r6->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r6->tenP}} ({{$r6->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms7 as $r7)
                                <td>
                                    @php
                                        $count = $r7->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r7->tenP}} ({{$r7->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r7->tenP}} ({{$r7->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms8 as $r8)
                                <td>
                                    @php
                                        $count = $r8->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r8->tenP}} ({{$r8->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r8->tenP}} ({{$r8->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($rooms9 as $r9)
                                <td>
                                    @php
                                        $count = $r9->count
                                    @endphp
                                    @if ($count > 0)
                                        <span style="background-color: greenyellow" >{{$r9->tenP}} ({{$r9->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @else
                                        <span >{{$r9->tenP}} ({{$r9->loaiP}})<br/>{{number_format($count)}} đ</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
@endsection
