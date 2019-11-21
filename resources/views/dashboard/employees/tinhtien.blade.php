@extends('master.master_employee')
@section('title','Phòng trống')
@section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection
@section('row_content')
    <div class="col-md-10">
        <h2>Tính tiền</h2>
    </div>
    <div class="col-md-2">
            <a href="{!! route('getlogout') !!}"><button class="btn btn-danger" id="btndangxuat">Đăng xuất</button></a>
    </div>
@endsection
@section('col_show')
    <div class="row table ">
        <div class="col-md-1" id="row_show">
            Tên phòng
        </div>
        <div class="col-md-1" id="row_show">
            Loại phòng
        </div>
        <div class="col-md-2" id="row_show">
            Tiền dịch vụ
        </div>
        <div class="col-md-2" id="row_show">
            Tính tiền
        </div>
    </div>
    @foreach ($rooms as $room)
        <div class="row table " >
            <div class="col-md-1" id="col_data">
                <p>
                    {!! $room->tenP !!}
                </p>
            </div>
            <div class="col-md-1" id="col_data">
                <p>
                    @if ($room->loaiP =='binhdan')
                    {!! 'Bình dân' !!}
                @elseif($room->loaiP =='thuonggia')
                    {!! 'Thương gia' !!}
                @elseif($room->loaiP =='Vip')
                    {!! 'Vip' !!}
                @elseif($room->loaiP =='Royal')
                    {!! 'Royal' !!}
                @endif
                </p>
            </div>

            <div class="col-md-2" id="col_data_button">
                {{--  -----------------Tinh tien dich vu---------------------  --}}
                @php
                    $tongdichvu = 0;
                    $dvs = App\phong::find($room->id)->dichvu()->get();
                    foreach ($dvs as $dv){
                        $tongdichvu += $dv->tongdichvu;
                    }
                @endphp
                {{number_format($tongdichvu)}}

            </div>
            <div class="col-md-2" id="col_data_button">
                    <form action="{{route('employee.thanhtoan',$room->id)}}" method="head">
                            @csrf
                            <input type="hidden"  name="tongDichVu" value="{!!$tongdichvu!!}">
                            {{--  <input type="hidden"  name="idP" value="{!!$room->id!!}">  --}}
                            <button type="submit" class="btn btn-primary">Tính tiền</button>
                    </form>
                    {{--  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tính tiền</button>

                    <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tidnh tiền</h5>
                            </div>
                            <form action="{{route('employee.thanhtoan',$room->id)}}" method="head">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden"  name="idP" value="{!!$room->id!!}">
                                    <input type="hidden"  name="tongDichVu" value="{!!$tongdichvu!!}">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Bạn có chắc chắn muốn tính tiền {{$room->tenP}}</strong><br>
                                        <b>Với số tiền dịch vụ là: {{number_format($tongdichvu)}}đ</b>
                                    </div>

                                        <script>
                                        $(".alert").alert();
                                        </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Hoàn thành</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>  --}}
            </div>
        </div>
    @endforeach
@endsection
