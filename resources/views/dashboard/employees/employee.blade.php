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
                <td>
                    @foreach ($rooms1 as $r1)
                        <div class="btn-group">
                            @if ($r1->tinhtrang ==0 && $r1->trong == 0)
                                <button style="color: yellow" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-times">  {{$r1->tenP}} ({{$r1->loaiP}})</i>
                                </button>
                                @elseif ($r1->tinhtrang == 0)
                                <button style="color: yellow" type="button" class="btn btn-warning  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    @if ($r1->trong == 0 && $r1->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                                <a href="{!! route('edit.dichvu.store',$r1->id) !!}"class="btn btn-success">Dịch vụ</a>
                                                <a href="{!! route('employee.tinhtien',$r1->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                                    @if ($r2->trong == 0 && $r2->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r2->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r2->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r3->trong == 0 && $r3->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r3->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r3->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r4->trong == 0 && $r4->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r4->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r4->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r5->trong == 0 && $r5->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r5->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r5->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r6->trong == 0 && $r6->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r6->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r6->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r7->trong == 0 && $r7->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r7->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r7->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r8->trong == 0 && $r8->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r8->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r8->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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
                                    @if ($r9->trong == 0 && $r9->tinhtrang == 0)
                                        <div class="btn-group" role="group" aria-label="Basic example" style="margin: auto">
                                            <a href="{!! route('edit.dichvu.store',$r9->id) !!}"class="btn btn-success">Dịch vụ</a>
                                            <a href="{!! route('employee.tinhtien',$r9->id) !!}" class="btn btn-success">Tính tièn</a>
                                        </div>
                                    @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Dịch vụ</button>
                                            <button class="btn btn-warning " id="btn-action" style="width: 100px">Tính tiền</button>
                                        </div>
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




