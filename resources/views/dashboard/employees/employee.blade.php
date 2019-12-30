@extends('master.employee')
@section('title','Dịch vụ và thanh toán')
@section('logo','Nhân viên')
@section('css')
    <link rel="stylesheet" href=" {{ url('resources/dashboard/style.css') }}">
@endsection
@section('col_contend')
    @include('master.include.employee_col_contend')
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
    <div class="row table" style="padding-left: 20px">
        @php
        $tang = App\phong::max('tang');
        @endphp

        <table class="table table-bordered table-responsive-md table-striped">
            @for($i = 1 ; $i <= $tang ; $i++)
                @php
                    $rooms=App\phong::all()->where('tang',$i);
                @endphp
                <tr>
                    @foreach ($rooms as $r)
                            <td>
                            @php
                            $data = App\phong::find($r->id)->ghichu()->get();
                            $countData = count($data);
                            @endphp
                            <div class="btn-group">
                                @if ($r->tinhtrang ==0 && $r->trong == 0 )
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times"> {{$r->tenP}} ({{$r->loaiP}})</i>
                                </button>
                                @elseif ($r->tinhtrang == 0 || $r->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit"> {{$r->tenP}} ({{$r->loaiP}})</i>
                                </button>
                                @elseif($r->tinhtrang ==1 && $r->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check"> {{$r->tenP}} ({{$r->loaiP}})</i>
                                </button>
                                @endif
                                <div class="dropdown-menu" style="width: 260px">
                                    <form action="" style="width: 250px ; padding: 5px">
                                        <div class="form-group">
                                            <label for="Tên phòng">Tên phòng</label>
                                            <span class="form-control">{{$r->tenP}} ({{$r->loaiP}})</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="Tình trạng">Tình trạng</label>
                                            <span class="form-control">
                                                @if ($r->tinhtrang ==1)
                                                Đã dọn
                                                @else
                                                Chưa dọn
                                                @endif
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="Trống">Trống</label>
                                            <span class="form-control">
                                                @if ($r->trong ==1)
                                                Trống
                                                @else
                                                Không trống
                                                @endif
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="Giá phòng">Giá phòng</label>
                                            <span class="form-control">
                                                Giờ: {{number_format($r->hour)}}đ
                                                Ngày: {{number_format($r->day)}}đ
                                            </span>
                                        </div>
                                        @if ($countData > 0)
                                        <div class="form-group">
                                            <label for="Ghi chú">Ghi chú</label>
                                            <textarea class="form-control" rows="2" id="Ghi chú" name="note">
                                                @foreach ($data as $d)
                                                    {{$d->note}}
                                                @endforeach
                                            </textarea>
                                        </div>
                                        @endif
                                    </form>
                                    <div class="row" style="padding: 5px">
                                        @if ($r->trong == 0 && $r->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r->id) !!}" class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                        @else
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <button class="btn btn-warning" id="btn-none" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning" id="btn-none" style="width: 100px">Tính tiền</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </td>
                    @endfor
                </tr>
        </table>
    </div>
@endsection




