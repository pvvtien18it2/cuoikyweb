@extends('layouts.be')
 @section('navbar')


                   <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span
                            class="icon-menu h3"></span></a></div>
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li>
                        <a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li ><a href="{{route('sukien')}}">Sự kiện</a></li>
                    <li><a href="{{route('employee.bookroom.store.get.khach')}}">Đặt phòng</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                </ul>
                </div>

                  @endsection


    @section('body')


      <div class="site-section site-section-sm">
          <div class="container">
            <div class="row">

              <div class="col-md-12 col-lg-8 mb-5">


        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
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
                      <label class="font-weight-bold" for="phone">Số điện thoại</label>
                      <div class="alert-danger">

                        <span class="error-message">{{ $errors->first('phone') }}</span>
                </div>
                      <input type="text" id="phone" name="phone" class="form-control" placeholder="Số điện thoại">
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
                      <label class="font-weight-bold" for="email">Địa chỉ</label>
                      <div class="alert-danger">

                        <span class="error-message">{{ $errors->first('add') }}</span>
                </div>
                <textarea class="form-control" rows="5" id="comment" name="add" placeholder="Địa chỉ"></textarea>
                    </div>
                  </div>




                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="email">Ngày đến</label>
                      <div class="alert-danger">

                        <span class="error-message">{{ $errors->first('come') }}</span>
                </div>
                      <input class="form-control" id="come" name="come" type="datetime-local" name="txtBookRoom">
                    </div>
                  </div>



                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="email">Ngày đi</label>
                      <div class="alert-danger">

                        <span class="error-message">{{ $errors->first('back') }}</span>
                </div>
                <input class="form-control" id="bạck" name="back" type="datetime-local" name="txtBookRoom">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="fullname">Số người ở</label>
                      <div class="alert-danger">

                        <span class="error-message">{{ $errors->first('people') }}</span>
                </div>
                      <input type="text" id="people" name="people" class="form-control" placeholder="Số ngừoi ở">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="email">loại phòng</label>
                      <div class="alert-danger">
                          <span class="error-message">{{ $errors->first('rooms') }}</span>
                      </div>
                <select name="rooms" id="rooms" class="font-weight-bold" >
                  <option value="Phòng Superior Đôi">Phòng Superior Đôi</option>
                  <option value="Phòng Twin Deluxe">Phòng Twin Deluxe</option>
                  <option value="Phòng Suite Twin">Phòng Suite Twin</option>
                  <option value="Phòng SJunior Suite đôi">Phòng SJunior Suite đôi</option>
                  <option value="Phòng Grand Suite đôi">Phòng Grand Suite đôi</option>
                </select>
                    </div>
                  </div>

                <div class="form-group">
                    <button class="btn btn-primary" name="up">ĐĂNG KÝ PHÒNG</button>
                </div>

            </form>

        </div>
            </div>
          </div>
            @endsection

