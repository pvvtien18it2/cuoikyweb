@extends('master.master_employee')
@section('title','Nhân viên')
@section('css')
<link rel="stylesheet" href="{!!url('resources/dashboard/employees/employee/style.css')!!}" >
@endsection
@section('row_content')
<div class="col-md-10">
    <h2>Nhân viên</h2>
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
            Tình trạng
        </div>
        <div class="col-md-2" id="row_show">
            Trống
        </div>
        <div class="col-md-2" id="row_show">
            Chỉnh sửa
        </div>
        <div class="col-md-2" id="row_show">
            Dịch vụ
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
                @if ($room->tinhtrang =='1')
                    <button class="btn btn-success" >Đã dọn</button>
                @else
                    <button class="btn btn-danger" >Chưa dọn</button>
                @endif
            </div>
            <div class="col-md-2" id="col_data_button">
                @if ($room->trong =='1')
                    <button class="btn btn-success" >Trống</button>
                @else
                    <button class="btn btn-danger" >Không trống</button>
                @endif
            </div>
            <div class="col-md-2" id="col_data_button">
                <a href="{!! route('employee.edit',$room->id) !!}"><button class="btn btn-success">Chỉnh sửa</button></a>
            </div>
            <div class="col-md-2" id="col_data_button">
                @if ($room->trong =='0')
                    <a href="{!! route('edit.dichvu.store',$room->id) !!}"><button class="btn btn-success">Dịch vụ</button></a>
                    {{--  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Dịch vụ</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">Dịch vụ</h3>
                        </div>
                        <form action=" {{route('dichvu.store')}}" method="head">
                        <div class="modal-body">

            @csrf
            <input type="hidden" name="idP" value="{{$room->id}}">

                <table class="table table-striped table-hover table-bordered"
                    style="width: 100%">
                    <thead>
                    <tr>
                        <td colspan="3">Tên dịch vụ</td>
                        <td colspan="2">Giá tiền</td>
                        <td colspan="2">Loại</td>
                        <td colspan="1">Số lượng</td>
                    </tr>
                    </thead>
                    @php($themDichVu = DB::table('cacloaidichvu')->get())
                    @foreach($themDichVu as $dv)
                        <tr>
                            <td colspan="3">
                                @if ($dv->tenDV =='nuocsuoi')
                                    {!! 'Nước suối' !!}
                                @elseif($dv->tenDV=='coca')
                                    {!! 'Coca' !!}
                                @elseif($dv->tenDV=='pepsi')
                                    {!! 'Pepsi' !!}
                                @elseif($dv->tenDV=='bohuc')
                                    {!! 'Bò húc' !!}
                                @elseif($dv->tenDV=='biasaigon')
                                    {!! 'Bia sài gòn' !!}
                                @elseif($dv->tenDV=='biaheineken')
                                    {!! 'Bia Heineken' !!}
                                @elseif($dv->tenDV=='biacorona')
                                    {!! 'Bia Corona' !!}
                                @elseif($dv->tenDV=='craven')
                                    {!! 'Thuốc lá Craven' !!}
                                @elseif($dv->tenDV=='baso')
                                    {!! 'Thuốc lá 555' !!}
                                @elseif($dv->tenDV=='anuong')
                                    {!! 'Ăn uống' !!}
                                @elseif($dv->tenDV=='combo1')
                                    {!! 'Combo 1' !!}
                                @elseif($dv->tenDV=='combo2')
                                    {!! 'Combo 2' !!}
                                @elseif($dv->tenDV=='combo3')
                                    {!! 'Combo 3' !!}
                                @elseif($dv->tenDV=='combo4')
                                    {!! 'Combo 4' !!}
                                @endif
                            </td>
                            <td colspan="2">
                                {!! number_format($dv->giaDV) !!}
                                <input type="hidden" value="{!! $dv->giaDV !!}" name="{!! 'hidden_gia_'.$dv->id !!}">
                            </td>
                            <td colspan="2">
                                @if ($dv->loai =='Chai')
                                    {!! 'Chai' !!}
                                @elseif($dv->loai=='Lon')
                                    {!! 'Lon' !!}
                                @elseif($dv->loai=='Goi')
                                    {!! 'Gói' !!}
                                @elseif($dv->loai=='Lan')
                                    {!! 'Lần' !!}
                                @elseif($dv->loai=='Ngay')
                                    {!! 'Ngày' !!}
                                @endif
                            </td>
                            <td colspan="1"><input type="text" value="0" name="{!! 'hidden_sl_'.$dv->id !!}"></td>
                        </tr>
                    @endforeach

                </table>
            {{-- <button type="submit" class="btn btn-danger" style="width: 30% ; margin-left: 30%">Thêm dịch vụ</button> --}}

                        {{--  </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Thêm dịch vụ</button>
                        </div>
                        </div>
                    </div>
                    </div>    --}}
                @else
                    <button class="btn btn-info">Dịch vụ</button>
                @endif
            {{--  </form>  --}}
            </div>
            <div class="col-md-2" id="col_data_button">
                <p>Tính tiền</p>
            </div>
        </div>


    @endforeach
@endsection
