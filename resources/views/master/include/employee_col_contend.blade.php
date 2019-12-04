{{-- Số lượng phòng đặt gần hẹn --}}
@php
    use Carbon\Carbon;
    $notifications = App\datphong::all();
    $count =0;
@endphp
@foreach ($notifications as $n)
    @php

        $timeOld = $n->dayBookRoom;
        $timeOld = Carbon::parse($timeOld);
        $days =  $timeOld->diffInDays(Carbon::now());
        if ($days <= 0){
            $count++;
        }
    @endphp
@endforeach

    <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active">
            Danh mục
        </button>
        <a href="{!!route('employee.index')!!}">
            <button type="button" class="list-group-item list-group-item-action">
                Thuê phòng
            </button>
        </a>
        <a href="{!!route('employee.quanly')!!}">
            <button type="button" class="list-group-item list-group-item-action">
                Dịch vụ và thanh toán
                </button>
        </a>
        <a href="{!!route('employee.check')!!}">
            <button type="button" class="list-group-item list-group-item-action">
                Đặt phòng trước
                <span class="badge badge-primary badge-pill">{{$count}}</span>
                </button>
        </a>
    </div>
