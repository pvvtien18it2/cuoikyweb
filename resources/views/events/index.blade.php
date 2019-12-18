@extends('layouts.ms')
@section('head.css')
    <style>
        .container div {
        margin: 10px;
        padding :10px;
        background: #ebf5fb;
        }
     </style>
@stop
@section('body.content')
<div class="container">
        @foreach ($events as $b)
        <div class="border">
                <h2>{{$b->title}}</h2>
                <p>{{Str::limit($b->content,20)}}</p>
                <form style="text-align: center" action="{{ route('events.delete',$b->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-info" href="{{ url('/employee/events',$b->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('events.edit', $b->id) }}">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
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

