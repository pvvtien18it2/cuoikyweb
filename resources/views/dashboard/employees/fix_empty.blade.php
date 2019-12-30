@extends('master.employee')
@section('title','Thuê phòng')
@section('logo','Nhân viên')
@section('css')
<link rel="stylesheet" href=" {{ url('resources/dashboard/style.css') }}">
@endsection
@section('col_contend')
@include('master.include.employee_col_contend')
@endsection

@section('col_show')
@if (session('mess'))
<div class="alert alert-success alert-dismissible fade show" style="margin: auto ; text-align: center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('mess') }}
</div>
@endif
@if (session('note'))
<div class="alert alert-secondary alert-dismissible fade show" style="margin: auto ; text-align: center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('note') }}
</div>
@endif
@if (session('status'))
<div class="alert alert-info alert-dismissible fade show" style="margin: auto ; text-align: center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {!! session('status') !!}
</div>
@endif
@if (session('success'))
<div class="alert alert-info alert-dismissible fade show" style="margin: auto ; text-align: center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {!! session('success') !!}
</div>
@endif
<div class="row table" style="padding-left: 20px">
    @php
    use Carbon\Carbon;
    $now = Carbon::now();
    $checks = App\datphong::all();
    $count = count($checks);
    $arr_phong_id = array();
    $arr_id = array();
    $arr_time = array();
    $arr = array();
    @endphp
    @if($count > 0 )
    @foreach ($checks as $c)
    @php
    $timeOld = $c->dayBookRoom;
    $timeOld = Carbon::parse($timeOld);
    $days = $timeOld->diffInDays($now);
    $times = $timeOld->diffInHours($now);
    array_push($arr_time, $times);
    asort($arr_time);
    @endphp
    @endforeach
    @foreach($arr_time as $a)
    @foreach ($checks as $c)
    @php
    $timeOld = $c->dayBookRoom;
    $timeOld = Carbon::parse($timeOld);
    $days = $timeOld->diffInDays($now);
    $times = $timeOld->diffInHours($now);
    @endphp
    @if( $times == $a && $days < 1) @php array_push($arr_phong_id, $c->phong_id);
        array_push($arr_id, $c->id);
        $arr = array_combine($arr_id, $arr_phong_id);
        @endphp
        @endif
        @endforeach
        @endforeach
        @else
        @php
        $arr_phong_id;
        $arr_id;
        $arr;
        @endphp
        @endif
        {{-- @php
                echo '<pre>';
                print_r($arr);
                echo '</pre>';
            @endphp --}}


        @php
        $tang = App\phong::max('tang');
        @endphp

        <table class="table table-bordered table-responsive-md table-striped">
            @for($i = 1 ; $i <= $tang ; $i++) @php $rooms=App\phong::all()->where('tang',$i);
                @endphp
                <tr>
                    @if($count >0)
                    @foreach ($rooms as $r)
                    <td>
                        @php
                        $data = App\phong::find($r->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        <div class="btn-group">
                            @if(in_array($r->id , $arr))
                            @php
                            $id = array_search($r->id , $arr);
                            $room = App\phong::find($r->id)->datphong()->where('id',$id)->first();
                            @php
                            @endphp
                            <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-times"> {{$r->tenP}} ({{$r->loaiP}})</i>
                            </button>
                            <div class="dropdown-menu" style="width: 260px">
                                <form action="{{route('employee.datphong',$r->id)}}" method="head" style="width: 250px ; padding: 5px">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Tên phòng">Tên phòng</label>
                                        <span class="form-control">{{$r->tenP}} ({{$r->loaiP}})</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tên">Tên</label>
                                        <span class="form-control">
                                            {{$room->name}}
                                        </span>
                                        <input type="hidden" name="txtName" value="{{$room->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="CMND">CMND</label>
                                        <span class="form-control">
                                            {{$room->number_cmnd}}
                                        </span>
                                        <input type="hidden" name="txtCMND" value="{{$room->number_cmnd}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Số điện thoại">Số điện thoại</label>
                                        <span class="form-control">
                                            {{$room->phone}}
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
                                    @php
                                    $day_create = date('Y-m-d H:i:s',time()) ;
                                    @endphp
                                    <input type="hidden" name="day_create" value="{{$day_create}}">
                                    <input type="hidden" name="txtNumber" value="{{$room->people}}">
                                    <input type="hidden" name="token" value="{{$room->token}}">
                                    <input type="hidden" name="phong_id" value="{{$room->phong_id}}">
                                    <div class="row" style="padding: 5px">
                                        <button id="btn-action" type="submit" class="btn btn-success">Đặt phòng</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @elseif ($r->tinhtrang ==0 && $r->trong == 0 )
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
                                @if ($countData > 0)
                                <div class="form-group">
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
                                @endif
                            </form>
                            <div class="row" style="padding: 5px">
                                @if ($r->trong == 1 && $r->tinhtrang == 1)
                                <a href="{!! route('book_room',$r->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                        sửa</button></a>
                                @endif
                            </div>
                        </div>
                        </div>
                    </td>
                        @endforeach
                        @else
                        @foreach ($rooms as $r)
                        @php
                            $data = App\phong::find($r->id)->ghichu()->get();
                            $countData = count($data);
                        @endphp
                        <td>
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
                                    @if ($r->trong == 1 && $r->tinhtrang == 1)
                                    <a href="{!! route('book_room',$r->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                            phòng</button></a>
                                    @else
                                    <a href="{!! route('employee.edit',$r->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                            sửa</button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </td>
                        @endforeach
                        @endif
                    @endfor
                </tr>
        </table>
        </div>
            @if($count > 0 )
                @foreach ($checks as $c)
                    @php
                        $dayBookRoom = Carbon::parse($c->dayBookRoom);
                        $check = $now->diffInDays($dayBookRoom);
                            if($dayBookRoom->isPast()){
                                $delete = App\datphong::find($c->id);
                                $delete->delete();
                                $room = App\phong::find($c->id);
                                $room->tinhtrang = 1;
                                $room->trong = 1;
                                $room->save();
                            }
                                $day_create = Carbon::parse($c->day_create);
                                $checkMin = $now->diffInMinutes($day_create);
                            if($count > 0 ){
                                if($checkMin >= 5 && $c->phong_id == null && $day_create->isPast()){
                                $delete = App\datphong::find($c->id);
                                $delete->delete();
                                }
                            }
                    @endphp
                @endforeach
            @endif

@endsection
