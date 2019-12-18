@extends('layouts.be')
 @section('navbar')

<div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span
            class="icon-menu h3"></span></a></div>
<ul class="site-menu js-clone-nav d-none d-lg-block">
    <li >
        <a href="{{route('trangchu')}}">Trang chủ</a></li>
    <li><a href="{{route('sukien')}}">Sự kiện</a></li>
    <li><a href="{{route('employee.bookroom.store.get.khach')}}">Đặt phòng</a></li>
    <li class="active"><a href="{{route('lienhe')}}">Liên hệ</a></li>
    <li><a href="{{route('login')}}">Đăng nhập</a></li>
</ul>
</div>

                  @endsection


    @section('body')



    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8 mb-5">



            <form action="{{ route('lienhe') }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Họ và tên</label>
                  <div class="alert-danger">

                    <span class="error-message">{{ $errors->first('name') }}</span>
            </div>
                  <input type="text" id="fullname" name="name" class="form-control" placeholder="Họ và tên">
                </div>
              </div>


              <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="email">Địa chỉ email</label>
                    <div class="alert-danger">

                      <span class="error-message">{{ $errors->first('email') }}</span>
              </div>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Địa chỉ email">
                  </div>
                </div>


              <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="">Ý kiến</label>
                    <div class="alert-danger">

                      <span class="error-message">{{ $errors->first('mess') }}</span>
              </div>
              <textarea class="form-control" rows="5" id="comment" name="mess" placeholder="Ý kiến"></textarea>
                  </div>
                </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>


            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Thông Tin</h3>
              <p class="mb-0 font-weight-bold">Địa chỉ</p>
              <p class="mb-4">Ngũ Hành Sơn, Đà Nẵng</p>

              <p class="mb-0 font-weight-bold">Số điện thoại</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email</p>
              <p class="mb-0"><a href="#">an@gmail.com</a></p>

            </div>


          </div>
        </div>
      </div>
    </div>


    @endsection
