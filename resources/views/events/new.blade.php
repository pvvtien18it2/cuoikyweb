@extends('layouts.ms')
@section('body.content')
<div class="container">
<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<label for="title">ADD NEW</label>
        <div class="form-group">

            <label for="title">tieu de</label>
            <div class="alert-danger">

                    <span class="error-message">{{ $errors->first('title') }}</span>
            </div>
            <input type="text" class="form-control" name="title" placeholder="nhập tên ở đây">

        </div>

        <div class="form-group">
            <label for="content">nội dung</label>
            <div class="alert-danger">
                    <span class="error-message">{{ $errors->first('content') }}</span>
            </div>
            <textarea class="form-control" rows="5" id="comment" name="content" placeholder="nhập nội dung ở đây"></textarea>
        </div>
        <div class="form-group">
        <input type="file" name="myfile">
    </div>
        <div class="form-group">
        <button class="btn btn-primary" name="up" type="submit">Đăng bài</button>
    </div>
    </form>
</div>
<hr>
@stop


