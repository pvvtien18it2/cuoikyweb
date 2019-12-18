@extends('layouts.be')
 @section('navbar')


                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span
                                class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li>
                            <a href="{{route('trangchu')}}">Trang chủ</a></li>
                        <li class="active"><a href="{{route('sukien')}}">Sự kiện</a></li>
                        <li><a href="{{route('employee.bookroom.store.get.khach')}}">Đặt phòng</a></li>
                        <li ><a href="{{route('lienhe')}}">Liên hệ</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    </ul>
                    </div>

                  @endsection

    @section('body')
    <div class="container" style="padding: 10px">
      @foreach ($events as $b)
      <div class="border">
              <h2>{{$b->title}}</h2>
              <p>{{Str::limit($b->content,500)}}</p>
              <form style="text-align: center" action="{{ route('events.delete',$b->id) }}" method="put">
                      @csrf
                      @method('delete')
                      <a class="btn btn-info" href="{{ route('xemthem',$b->id) }}">Xem thêm</a>
              </form>
      </div>
      @endforeach
  </div>
  <div class="row">
      <div class="col-sm-5"></div>
          {!! $events->render() !!}
      </div>
      <div class="col-sm-5"></div>
  </div>
  <hr>
    @endsection
