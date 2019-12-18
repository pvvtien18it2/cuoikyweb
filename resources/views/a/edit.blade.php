@extends('layouts.master')
@section('body.content')
<div class="container">
<form action="{{ route('post.update',$post->id) }}" method="POST">
@method('put')
<input type="hidden" name="_token" value="{{csrf_token() }}">


        <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="fullname">Họ và tên</label>
              <div class="alert-danger">

                <span class="error-message">{{ $errors->first('name') }}</span>
        </div>
              <input type="text" value="{!! $post->name ?? old('name') !!}" id="fullname" name="name" class="form-control" placeholder="Họ và tên">
            </div>
          </div>
          <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="phone">Số điện thoại</label>
                <div class="alert-danger">

                  <span class="error-message">{{ $errors->first('phone') }}</span>
          </div>
                <input type="text" value="{!! $post->phone ?? old('phone') !!}" id="phone" name="phone" class="form-control" placeholder="Số điện thoại">
              </div>
            </div>

          <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="email">Địa chỉ email</label>
                <div class="alert-danger">

                  <span class="error-message">{{ $errors->first('email') }}</span>
          </div>
                <input type="text" value="{!! $post->email ?? old('email') !!}" id="email" name="email" class="form-control" placeholder="Địa chỉ email">
              </div>
            </div>


          <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="email">Địa chỉ</label>
                <div class="alert-danger">

                  <span class="error-message">{{ $errors->first('add') }}</span>
          </div>
          <textarea class="form-control" rows="5" id="add" name="add" placeholder="nhập nội dung ở đây">{!! $post->add ?? old('add') !!}</textarea>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="phone">Số người ở</label>
                <div class="alert-danger">

                  <span class="error-message">{{ $errors->first('people') }}</span>
          </div>
                <input type="text" value="{!! $post->people ?? old('peple') !!}" id="people" name="people" class="form-control" placeholder="Số người ở">
              </div>
            </div>



          <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="email">Ngày đến</label>
                <div class="alert-danger">

                  <span class="error-message">{{ $errors->first('come') }}</span>
          </div>
                <input type="text" value="{!! $post->come ?? old('come') !!}" id="come" name="come" class="form-control" placeholder="Ngày đến">
              </div>
            </div>



          <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="email">Ngày đi</label>
                <div class="alert-danger">

                  <span class="error-message">{{ $errors->first('back') }}</span>
          </div>
                <input type="text" value="{!! $post->back ?? old('back') !!}" id="back" name="back" class="form-control" placeholder="Ngày đi">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="email">loại phòng</label>
                <div class="alert-danger">
                    <span class="error-message">{{ $errors->first('rooms') }}</span>
                </div>
          <select name="rooms" id="rooms">
            <option value="Phòng Superior Đôi">Phòng Superior Đôi</option>
            <option value="Phòng Twin Deluxe">phòng Twin Deluxe</option>
            <option value="Phòng Suite Twin">phòng Suite Twin</option>
            <option value="Phòng SJunior Suite đôi">phòng Junior Suite đôi</option>
            <option value="Phòng Grand Suite đôi">phòng Grand Suite đôi</option>
          </select>
              </div>
            </div>
        <div class="form-group">
        <button class="btn btn-primary" name="up">sửa</button>
    </div>
    </form>
</div>
<hr>
@stop
