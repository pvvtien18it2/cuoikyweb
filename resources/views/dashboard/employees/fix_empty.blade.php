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
    $rooms1 = DB::table('phong')->where('tang',1)->get();
    $rooms2 = DB::table('phong')->where('tang',2)->get();
    $rooms3 = DB::table('phong')->where('tang',3)->get();
    $rooms4 = DB::table('phong')->where('tang',4)->get();
    $rooms5 = DB::table('phong')->where('tang',5)->get();
    $rooms6 = DB::table('phong')->where('tang',6)->get();
    $rooms7 = DB::table('phong')->where('tang',7)->get();
    $rooms8 = DB::table('phong')->where('tang',8)->get();
    $rooms9 = DB::table('phong')->where('tang',9)->get();
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
        <table class="table table-bordered table-responsive-md table-striped">
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms1 as $r1)
                    @php
                    $data = App\phong::find($r1->id)->ghichu()->get();
                    $countData = count($data);
                    @endphp
                    <div class="btn-group">
                        @if(in_array($r1->id , $arr))
                        @php
                        $id = array_search($r1->id , $arr);
                        $room = App\phong::find($r1->id)->datphong()->where('id',$id)->first();
                        @php
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r1->id)}}" method="head"
                                style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r1->tenP}} ({{$r1->loaiP}})</span>
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
                    @elseif ($r1->tinhtrang ==0 && $r1->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                    </button>
                    @elseif ($r1->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                    </button>
                    @elseif($r1->tinhtrang ==1 && $r1->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r1->tenP}} ({{$r1->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r1->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r1->trong ==1)
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
                            @if ($r1->trong == 1 && $r1->tinhtrang == 1)
                            <a href="{!! route('book_room',$r1->id) !!}"><button id="btn-action"
                                    class="btn btn-success">Đặt phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r1->id) !!}"><button id="btn-action"
                                    class="btn btn-warning ">Chỉnh sửa</button></a>
                            @endif
                        </div>
                    </div>
            </div>
            @endforeach
            @else
            @foreach ($rooms1 as $r1)
            @php
            $data = App\phong::find($r1->id)->ghichu()->get();
            $countData = count($data);
            @endphp
            <div class="btn-group">
                @if ($r1->tinhtrang ==0 && $r1->trong == 0 )
                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-times"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                </button>
                @elseif ($r1->tinhtrang == 0)
                <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-edit"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                </button>
                @elseif($r1->tinhtrang ==1 && $r1->trong == 1)
                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-check"> {{$r1->tenP}} ({{$r1->loaiP}})</i>
                </button>
                @endif
                <div class="dropdown-menu" style="width: 300px">
                    <form action="" style="width: 280px ; padding: 5px">
                        <div class="form-group">
                            <label for="Tên phòng">Tên phòng</label>
                            <span class="form-control">{{$r1->tenP}} ({{$r1->loaiP}})</span>
                        </div>
                        <div class="form-group">
                            <label for="Tình trạng">Tình trạng</label>
                            <span class="form-control">
                                @if ($r1->tinhtrang ==1)
                                Đã dọn
                                @else
                                Chưa dọn
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Trống">Trống</label>
                            <span class="form-control">
                                @if ($r1->trong ==1)
                                Trống
                                @else
                                Không trống
                                @endif
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
                        @if ($r1->trong == 1 && $r1->tinhtrang == 1)
                        <a href="{!! route('book_room',$r1->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                phòng</button></a>
                        @else
                        <a href="{!! route('employee.edit',$r1->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                sửa</button></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms2 as $r2)
                    @php
                    $data = App\phong::find($r2->id)->ghichu()->get();
                    $countData = count($data);
                    @endphp
                    <div class="btn-group">
                        @if(in_array($r2->id , $arr))
                        @php
                        $id = array_search($r2->id , $arr);
                        $room = App\phong::find($r2->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r2->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r2->tenP}} ({{$r2->loaiP}})</span>
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
                    @elseif ($r2->tinhtrang ==0 && $r2->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                    </button>
                    @elseif ($r2->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                    </button>
                    @elseif($r2->tinhtrang ==1 && $r2->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r2->tenP}} ({{$r2->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r2->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r2->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r2->trong == 1 && $r2->tinhtrang == 1)
                            <a href="{!! route('book_room',$r2->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r2->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms2 as $r2)
                    @php
                    $data = App\phong::find($r2->id)->ghichu()->get();
                    $countData = count($data);
                    @endphp
                    <div class="btn-group">
                        @if ($r2->tinhtrang ==0 && $r2->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                        </button>
                        @elseif ($r2->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                        </button>
                        @elseif($r2->tinhtrang ==1 && $r2->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r2->tenP}} ({{$r2->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r2->tenP}} ({{$r2->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r2->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r2->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r2->trong == 1 && $r2->tinhtrang == 1)
                                <a href="{!! route('book_room',$r2->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r2->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms3 as $r3)
                    @php
                    $data = App\phong::find($r3->id)->ghichu()->get();
                    $countData = count($data);
                    @endphp
                    <div class="btn-group">
                        @if(in_array($r3->id , $arr))
                        @php
                        $id = array_search($r3->id , $arr);
                        $room = App\phong::find($r3->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r3->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r3->tenP}} ({{$r3->loaiP}})</span>
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
                    @elseif ($r3->tinhtrang ==0 && $r3->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                    </button>
                    @elseif ($r3->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                    </button>
                    @elseif($r3->tinhtrang ==1 && $r3->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r3->tenP}} ({{$r3->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r3->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r3->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r3->trong == 1 && $r3->tinhtrang == 1)
                            <a href="{!! route('book_room',$r3->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r3->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms3 as $r3)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r3->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r3->tinhtrang ==0 && $r3->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                        </button>
                        @elseif ($r3->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                        </button>
                        @elseif($r3->tinhtrang ==1 && $r3->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r3->tenP}} ({{$r3->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r3->tenP}} ({{$r3->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r3->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r3->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r3->trong == 1 && $r3->tinhtrang == 1)
                                <a href="{!! route('book_room',$r3->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r3->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms4 as $r4)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r4->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if(in_array($r4->id , $arr))
                        @php
                        $id = array_search($r4->id , $arr);
                        $room = App\phong::find($r4->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r4->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r4->tenP}} ({{$r4->loaiP}})</span>
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
                    @elseif ($r4->tinhtrang ==0 && $r4->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                    </button>
                    @elseif ($r4->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                    </button>
                    @elseif($r4->tinhtrang ==1 && $r4->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r4->tenP}} ({{$r4->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r4->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r4->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r4->trong == 1 && $r4->tinhtrang == 1)
                            <a href="{!! route('book_room',$r4->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r4->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms4 as $r4)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r4->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r4->tinhtrang ==0 && $r4->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                        </button>
                        @elseif ($r4->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                        </button>
                        @elseif($r4->tinhtrang ==1 && $r4->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r4->tenP}} ({{$r4->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r4->tenP}} ({{$r4->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r4->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r4->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r4->trong == 1 && $r4->tinhtrang == 1)
                                <a href="{!! route('book_room',$r4->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r4->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms5 as $r5)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r5->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if(in_array($r5->id , $arr))
                        @php
                        $id = array_search($r5->id , $arr);
                        $room = App\phong::find($r5->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r5->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r5->tenP}} ({{$r5->loaiP}})</span>
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
                                $day_create = date('Y-m-d H:i:s',time());
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
                    @elseif ($r5->tinhtrang ==0 && $r5->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                    </button>
                    @elseif ($r5->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                    </button>
                    @elseif($r5->tinhtrang ==1 && $r5->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r5->tenP}} ({{$r5->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r5->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r5->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r5->trong == 1 && $r5->tinhtrang == 1)
                            <a href="{!! route('book_room',$r5->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r5->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms5 as $r5)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r5->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r5->tinhtrang ==0 && $r5->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                        </button>
                        @elseif ($r5->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                        </button>
                        @elseif($r5->tinhtrang ==1 && $r5->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r5->tenP}} ({{$r5->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r5->tenP}} ({{$r5->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r5->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r5->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r5->trong == 1 && $r5->tinhtrang == 1)
                                <a href="{!! route('book_room',$r5->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r5->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms6 as $r6)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r6->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if(in_array($r6->id , $arr))
                        @php
                        $id = array_search($r6->id , $arr);
                        $room = App\phong::find($r6->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r6->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r6->tenP}} ({{$r6->loaiP}})</span>
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
                    @elseif ($r6->tinhtrang ==0 && $r6->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                    </button>
                    @elseif ($r6->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                    </button>
                    @elseif($r6->tinhtrang ==1 && $r6->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r6->tenP}} ({{$r6->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r6->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r6->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r6->trong == 1 && $r6->tinhtrang == 1)
                            <a href="{!! route('book_room',$r6->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r6->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms6 as $r6)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r6->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r6->tinhtrang ==0 && $r6->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                        </button>
                        @elseif ($r6->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                        </button>
                        @elseif($r6->tinhtrang ==1 && $r6->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r6->tenP}} ({{$r6->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r6->tenP}} ({{$r6->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r6->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r6->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r6->trong == 1 && $r6->tinhtrang == 1)
                                <a href="{!! route('book_room',$r6->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r6->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms7 as $r7)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r7->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if(in_array($r7->id , $arr))
                        @php
                        $id = array_search($r7->id , $arr);
                        $room = App\phong::find($r7->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r7->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r7->tenP}} ({{$r7->loaiP}})</span>
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
                    @elseif ($r7->tinhtrang ==0 && $r7->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                    </button>
                    @elseif ($r7->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                    </button>
                    @elseif($r7->tinhtrang ==1 && $r7->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r7->tenP}} ({{$r7->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r7->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r7->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r7->trong == 1 && $r7->tinhtrang == 1)
                            <a href="{!! route('book_room',$r7->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r7->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms7 as $r7)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r7->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r7->tinhtrang ==0 && $r7->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                        </button>
                        @elseif ($r7->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                        </button>
                        @elseif($r7->tinhtrang ==1 && $r7->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r7->tenP}} ({{$r7->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r7->tenP}} ({{$r7->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r7->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r7->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r7->trong == 1 && $r7->tinhtrang == 1)
                                <a href="{!! route('book_room',$r7->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r7->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms8 as $r8)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r8->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if(in_array($r8->id , $arr))
                        @php
                        $id = array_search($r8->id , $arr);
                        $room = App\phong::find($r8->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r8->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r8->tenP}} ({{$r8->loaiP}})</span>
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
                    @elseif ($r8->tinhtrang ==0 && $r8->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                    </button>
                    @elseif ($r8->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                    </button>
                    @elseif($r8->tinhtrang ==1 && $r8->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r8->tenP}} ({{$r8->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r8->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r8->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r8->trong == 1 && $r8->tinhtrang == 1)
                            <a href="{!! route('book_room',$r8->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r8->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms8 as $r8)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r8->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r8->tinhtrang ==0 && $r8->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                        </button>
                        @elseif ($r8->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                        </button>
                        @elseif($r8->tinhtrang ==1 && $r8->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r8->tenP}} ({{$r8->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r8->tenP}} ({{$r8->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r8->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r8->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r8->trong == 1 && $r8->tinhtrang == 1)
                                <a href="{!! route('book_room',$r8->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r8->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms9 as $r9)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r9->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if(in_array($r9->id , $arr))
                        @php
                        $id = array_search($r9->id , $arr);
                        $room = App\phong::find($r9->id)->datphong()->where('id',$id)->first();
                        @endphp
                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                        </button>
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="{{route('employee.datphong',$r9->id)}}" method="head" style="width: 280px ; padding: 5px">
                                @csrf
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r9->tenP}} ({{$r9->loaiP}})</span>
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
                    @elseif ($r9->tinhtrang ==0 && $r9->trong == 0 )
                    <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-times"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                    </button>
                    @elseif ($r9->tinhtrang == 0)
                    <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-edit"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                    </button>
                    @elseif($r9->tinhtrang ==1 && $r9->trong == 1)
                    <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-check"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                    </button>
                    @endif
                    <div class="dropdown-menu" style="width: 300px">
                        <form action="" style="width: 280px ; padding: 5px">
                            <div class="form-group">
                                <label for="Tên phòng">Tên phòng</label>
                                <span class="form-control">{{$r9->tenP}} ({{$r9->loaiP}})</span>
                            </div>
                            <div class="form-group">
                                <label for="Tình trạng">Tình trạng</label>
                                <span class="form-control">
                                    @if ($r9->tinhtrang ==1)
                                    Đã dọn
                                    @else
                                    Chưa dọn
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Trống">Trống</label>
                                <span class="form-control">
                                    @if ($r9->trong ==1)
                                    Trống
                                    @else
                                    Không trống
                                    @endif
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
                            @if ($r9->trong == 1 && $r9->tinhtrang == 1)
                            <a href="{!! route('book_room',$r9->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                    phòng</button></a>
                            @else
                            <a href="{!! route('employee.edit',$r9->id) !!}"><button id="btn-action" class="btn btn-warning ">Chỉnh
                                    sửa</button></a>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($rooms9 as $r9)
                    <div class="btn-group">
                        @php
                        $data = App\phong::find($r9->id)->ghichu()->get();
                        $countData = count($data);
                        @endphp
                        @if ($r9->tinhtrang ==0 && $r9->trong == 0 )
                        <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-times"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                        </button>
                        @elseif ($r9->tinhtrang == 0)
                        <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-edit"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                        </button>
                        @elseif($r9->tinhtrang ==1 && $r9->trong == 1)
                        <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-check"> {{$r9->tenP}} ({{$r9->loaiP}})</i>
                        </button>
                        @endif
                        <div class="dropdown-menu" style="width: 300px">
                            <form action="" style="width: 280px ; padding: 5px">
                                <div class="form-group">
                                    <label for="Tên phòng">Tên phòng</label>
                                    <span class="form-control">{{$r9->tenP}} ({{$r9->loaiP}})</span>
                                </div>
                                <div class="form-group">
                                    <label for="Tình trạng">Tình trạng</label>
                                    <span class="form-control">
                                        @if ($r9->tinhtrang ==1)
                                        Đã dọn
                                        @else
                                        Chưa dọn
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Trống">Trống</label>
                                    <span class="form-control">
                                        @if ($r9->trong ==1)
                                        Trống
                                        @else
                                        Không trống
                                        @endif
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
                                @if ($r9->trong == 1 && $r9->tinhtrang == 1)
                                <a href="{!! route('book_room',$r9->id) !!}"><button id="btn-action" class="btn btn-success">Đặt
                                        phòng</button></a>
                                @else
                                <a href="{!! route('employee.edit',$r9->id) !!}"><button id="btn-action"
                                        class="btn btn-warning ">Chỉnh sửa</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </td>
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
