@extends('master.employee')
@section('title','Thuê phòng')
@section('logo','Nhân viên')
@section('col_contend')
    @include('master.include.employee_col_contend')
@endsection
@section('col_show')
    @if (session('note'))
        <div class="alert alert-success alert-dismissible fade show" style="margin: auto ; text-align: center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('note') }}
        </div>
    @endif
    @if (session('tinhtrang'))
        <div class="alert alert-success alert-dismissible fade show" style="margin: auto ; text-align: center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('tinhtrang') }}
        </div>
    @endif
    @php
        use Carbon\Carbon;
        $now = Carbon::now();
        $stt = 1;
        if(Auth::check()){
            $name = Auth::user()->name;
        }
    @endphp
    <div class="container">
            @if(count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" style="margin: auto ; text-align: left">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="col-md-7 offset-md-5">
                    {!! $errors->first('tenP') !!}<br>
                    {!! $errors->first('note') !!}<br>
                </div>
            </div>
            @endif
        <div class="row">
            <h2 style="text-align: center ; font-size: 70px ; padding: 20px; margin: auto">Danh sách ghi chú</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="width: 200px ; height: 50px; margin: auto">Thêm ghi chú</button>

            <!-- Modal -->
            <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm ghi chú</h5>
                </div>
                <div class="modal-body">

                    <form action="{{route('employee.addghichu')}}" method="head">
                        @csrf
                        <div class="form-group row">
                            <label for="Tên người tạo" class="col-sm-2 col-form-label">Tên người tạo</label>
                            <div class="col-sm-10">
                            <input type="text" readonly='false' name="name" class="form-control"  value="{{$name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Tên phòng" class="col-sm-2 col-form-label">Tên phòng *</label>
                            <div class="col-sm-10">
                            <input type="text" name="tenP" class="form-control" placeholder="Nhập tên phòng (Ghi hoa)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Ghi chú" class="col-sm-2 col-form-label">Ghi chú</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="Ghi chú" name="note" placeholder="Vui lòng nhập ghi chú"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="day_create" value="{{$now->toDateString()}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Hoàn thành</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <td colspan="1">STT</td>
                    <td colspan="1">Phòng</td>
                    <td colspan="6">Ghi chú</td>
                    <td colspan="2">Thời gian</td>
                    <td colspan="1">Xóa</td>
                </thead>

                @if (count($notes) > 0)
                    @foreach ($notes as $note)
                    @php
                        $room = App\phong::find($note->phong_id);
                    @endphp
                        <tr>
                            <td colspan="1">{{$stt++}}</td>
                            <td colspan="1">{{$room->tenP}}</td>
                            <td colspan="6"><textarea readonly='false' class="form-control" rows="3">{{$note->note}}</textarea></td>
                            <td colspan="2">{{$note->day_create}}</td>
                            <td colspan="1"><a href="{{route('employee.xoaghichu',$note->id)}}"><button class="btn btn-danger" style="margin: auto">Đã xử lý</button></a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
