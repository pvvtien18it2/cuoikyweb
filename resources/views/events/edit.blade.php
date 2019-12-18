@extends('layouts.ms')
@section('body.content')
<div class="container">
<form action="{{ route('events.update',$post->id) }}" method="POST">
@method('put')
<input type="hidden" name="_token" value="{{csrf_token() }}">

        <div class="form-group">
            <label for="title">EDIT</label>
            <div class="alert-danger">
                    <span class="error-message">{{ $errors->first('title') }}</span>
            </div>
            <input type="text" class="form-control" name="title" value="{!! $post->title ?? old('title') !!}" placeholder="nhập tên ở đây">

        </div>

        <div class="form-group">
            <label for="content">nội dung</label>
            <div class="alert-danger">
                    <span class="error-message">{{ $errors->first('content') }}</span>
            </div>
            <textarea class="form-control" rows="5" id="comment" name="content" placeholder="nhập nội dung ở đây">{!! $post->content ?? old('content') !!}</textarea>
            {{-- <input type="text" class="form-control" name="content" value="{{ $post->content}}" placeholder="nhập tên ở đây"> --}}
        </div>
        <div class="form-group">
        <button class="btn btn-primary" name="up">sửa bài</button>
    </div>
    </form>
</div>
<hr>
@stop
