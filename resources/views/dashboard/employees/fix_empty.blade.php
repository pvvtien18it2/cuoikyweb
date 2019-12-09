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
                $count  = count($checks);
                $arr = array();
            @endphp
            @if($count > 0 )
                @foreach ($checks as $c)
                    @php
                        $dayBookRoom = Carbon::parse($c->dayBookRoom);
                        $check = $now->diffInDays($dayBookRoom);
                        if($check == 0){
                            array_push($arr, $c->phong_id);
                        }
                        if($dayBookRoom->isPast()){
                            $delete = App\datphong::find($c->id);
                            $delete->delete();
                            $room = App\phong::find($c->id);
                            $room->tinhtrang = 1;
                            $room->trong = 1;
                            $room->save();
                        }
                    @endphp

                @endforeach
            @else
                @php
                    $arr;
                @endphp
            @endif
            @php
                echo '<pre>';
                print_r($arr);
                echo '</pre>';
            @endphp
        <table class="table table-bordered table-responsive-md table-striped">
            <tr>
                <td>
                    @if($count >0)
                    @foreach ($rooms1 as $r1)
                        <div class="btn-group">
                                @if(in_array($r1->id,$arr))
                                @php
                                    //$now = Carbon::now();
                                    $room = App\datphong::where('phong_id',$r1->id)->first();
                                    //$dayBookRoom = Carbon::parse($room->dayBookRoom);
                                    //$check = $now->diffInDays($dayBookRoom);
                                @endphp
                                    {{--  @if ($check == 0)  --}}
                                        <button style="color: yellow" type="button" class="btn btn-dark  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-times">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                        </button>
                                        <div class="dropdown-menu" style="width: 300px">
                                            <form action="{{route('employee.datphong',$r1->id)}}" method="head" style="width: 280px ; padding: 5px">
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
                                                @php
                                                    $day_create = date('Y-m-d H:i:s',time()) ;
                                                @endphp
                                                <input type="hidden" name="day_create" value="{{$day_create}}">
                                                <input type="hidden" name="txtNumber" value="{{$room->people}}">
                                                <input type="hidden" name="token" value="{{$room->token}}">
                                                <input type="hidden" name="phong_id" value="{{$room->phong_id}}">
                                                <div class="row" style="padding: 5px">
                                                    <button id="btn-action" type="submit"  class="btn btn-success">Đặt phòng</button></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{--  @endif  --}}
                            @elseif ($r1->tinhtrang ==0 && $r1->trong == 0 )
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                </button>
                            @elseif ($r1->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                </button>
                            @elseif($r1->tinhtrang ==1 && $r1->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
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
                                    @if ($r1->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r1->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r1->trong == 1 && $r1->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r1->id) !!}"><button id="btn-action"   class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r1->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    @else
                        @foreach ($rooms1 as $r1)
                            <div class="btn-group">
                            @if ($r1->tinhtrang ==0 && $r1->trong == 0 )
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                </button>
                            @elseif ($r1->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning   dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                </button>
                            @elseif($r1->tinhtrang ==1 && $r1->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
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
                                    @if ($r1->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r1->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r1->trong == 1 && $r1->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r1->id) !!}"><button id="btn-action"   class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r1->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
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
                    @foreach ($rooms2 as $r2)
                        <div class="btn-group">
                                @if ($r2->tinhtrang ==0 && $r2->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r2->tenP}} ({{$r2->loaiP}})</i>
                                </button>
                                @elseif ($r2->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r2->tenP}} ({{$r2->loaiP}})</i>
                                </button>
                                @elseif($r2->tinhtrang ==1 && $r2->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r2->tenP}} ({{$r2->loaiP}})</i>
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
                                    @if ($r2->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r2->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r2->trong == 1 && $r2->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r2->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r2->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms3 as $r3)
                        <div class="btn-group">
                                @if ($r3->tinhtrang ==0 && $r3->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r3->tenP}} ({{$r3->loaiP}})</i>
                                </button>
                                @elseif ($r3->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r3->tenP}} ({{$r3->loaiP}})</i>
                                </button>
                                @elseif($r3->tinhtrang ==1 && $r3->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r3->tenP}} ({{$r3->loaiP}})</i>
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
                                    @if ($r3->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r3->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r3->trong == 1 && $r3->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r3->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r3->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms4 as $r4)
                        <div class="btn-group">
                                @if ($r4->tinhtrang ==0 && $r4->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r4->tenP}} ({{$r4->loaiP}})</i>
                                </button>
                                @elseif ($r4->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r4->tenP}} ({{$r4->loaiP}})</i>
                                </button>
                                @elseif($r4->tinhtrang ==1 && $r4->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r4->tenP}} ({{$r4->loaiP}})</i>
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
                                    @if ($r4->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r4->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r4->trong == 1 && $r4->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r4->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r4->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms5 as $r5)
                        <div class="btn-group">

                                @if ($r5->tinhtrang ==0 && $r5->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r5->tenP}} ({{$r5->loaiP}})</i>
                                </button>
                                @elseif ($r5->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r5->tenP}} ({{$r5->loaiP}})</i>
                                </button>
                                @elseif($r5->tinhtrang ==1 && $r5->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r5->tenP}} ({{$r5->loaiP}})</i>
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
                                    @if ($r5->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r5->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r5->trong == 1 && $r5->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r5->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r5->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms6 as $r6)
                        <div class="btn-group">
                                @if ($r6->tinhtrang ==0 && $r6->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r6->tenP}} ({{$r6->loaiP}})</i>
                                </button>
                                @elseif ($r6->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r6->tenP}} ({{$r6->loaiP}})</i>
                                </button>
                                @elseif($r6->tinhtrang ==1 && $r6->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r6->tenP}} ({{$r6->loaiP}})</i>
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
                                    @if ($r6->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r6->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r6->trong == 1 && $r6->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r6->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r6->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms7 as $r7)
                        <div class="btn-group">

                                @if ($r7->tinhtrang ==0 && $r7->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r7->tenP}} ({{$r7->loaiP}})</i>
                                </button>
                                @elseif ($r1->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r7->tenP}} ({{$r7->loaiP}})</i>
                                </button>
                                @elseif($r7->tinhtrang ==1 && $r7->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r7->tenP}} ({{$r7->loaiP}})</i>
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
                                    @if ($r7->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r7->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r7->trong == 1 && $r7->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r7->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r7->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms8 as $r8)
                        <div class="btn-group">

                                @if ($r8->tinhtrang ==0 && $r8->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r8->tenP}} ({{$r8->loaiP}})</i>
                                </button>
                                @elseif ($r8->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r8->tenP}} ({{$r8->loaiP}})</i>
                                </button>
                                @elseif($r8->tinhtrang ==1 && $r8->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r8->tenP}} ({{$r8->loaiP}})</i>
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
                                    @if ($r8->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r8->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r8->trong == 1 && $r8->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r8->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r8->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    @foreach ($rooms9 as $r9)
                        <div class="btn-group">

                                @if ($r9->tinhtrang ==0 && $r9->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r9->tenP}} ({{$r9->loaiP}})</i>
                                </button>
                                @elseif ($r9->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-edit">  {{$r9->tenP}} ({{$r9->loaiP}})</i>
                                </button>
                                @elseif($r9->tinhtrang ==1 && $r9->trong == 1)
                                <button style="color: yellow" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-check">  {{$r9->tenP}} ({{$r9->loaiP}})</i>
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
                                    @if ($r9->ghichu != null)
                                    <div class="form-group">
                                    <label for="Ghi chú">Ghi chú</label>
                                    <span class="form-control">
                                            {{$r9->ghichu}}
                                        </span>
                                    </div>
                                    @endif
                                </form>
                                <div class="row" style="padding: 5px">
                                    @if ($r9->trong == 1 && $r9->tinhtrang == 1)
                                            <a href="{!! route('book_room',$r9->id) !!}"><button id="btn-action"  class="btn btn-success">Đặt phòng</button></a>
                                    @else
                                            <a href="{!! route('employee.edit',$r9->id) !!}"><button id="btn-action"  class="btn btn-warning ">Chỉnh sửa</button></a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
@endsection




