@extends('layouts.ms')
@section('body.content')
    <div class="container">
        <div class="row">
    
            <h2>{{$page->title}}</h2>
    
            <p>{{$page->content}}</p>
    
        </div>
        <div class="row" style="height='1000px'">
            @isset($page->myfile)
    
            <img src="{!! url('uploads',$page->myfile)!!}" alt="" style="width:50%; height:50% ">
    
            @endisset
        </div>
    </div>
    <hr>
@stop
