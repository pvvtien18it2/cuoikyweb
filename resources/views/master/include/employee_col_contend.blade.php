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
@php
    $note = App\ghichu::all();
    $countNote = count($note);
@endphp
    <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active">
            Danh mục
        </button>
        <a href="{!!route('employee.index')!!}" style="text-decoration: none">
            <button type="button" class="list-group-item list-group-item-action">
                Thuê phòng
            </button>
        </a>
        <a href="/cuoikyweb/employee/events" style="text-decoration: none">
            <button type="button" class="list-group-item list-group-item-action">
                Danh sách sự kiện
            </button>
        </a>
        <a href="/cuoikyweb/employee/adcontact" style="text-decoration: none">
            <button type="button" class="list-group-item list-group-item-action">
                Ý kiến phản hồi của khách hàng
            </button>
        </a>
        <a href="{!!route('employee.quanly')!!}" style="text-decoration: none">
            <button type="button" class="list-group-item list-group-item-action">
                Dịch vụ và thanh toán
            </button>
        </a>
        <a href="{!!route('employee.check')!!}" style="text-decoration: none">
            <button type="button" class="list-group-item list-group-item-action">
                Đặt phòng trước
                <span class="badge badge-primary badge-pill">{{$count}}</span>
            </button>
        </a>
        <a href="{!!route('employee.ghichu')!!}" style="text-decoration: none">
            <button type="button" class="list-group-item list-group-item-action">
                Ghi chú
                <span class="badge badge-primary badge-pill">{{$countNote}}</span>
            </button>
        </a>

    </div>
