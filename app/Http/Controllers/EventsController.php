<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Events;
use App\evetns;
use App\Http\Requests\EventsFormRequest;

class EventsController extends Controller
{
    public function sukien(){
        $events = events::latest()->paginate(5);
        return view('b.events' , compact('events'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
    public function index(){
        $events = events::latest()->paginate(5);
        return view('events.index' , compact('events'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
    public function xemthem($id){
        $page = events::find($id);
        return view('b.xemthem')->with('page',$page);
    }

    public function show($id){
        $page = events::find($id);
        return view('events.show')->with('page',$page);
    }
    public function new()
    {
        return view('events.new');
    }

    public function store(EventsFormRequest $request)
    {
        if($request->file('myfile') != null){
            $img = $request->file('myfile');
            $img_n = $img->getClientOriginalName();
        }
        
        $events = new events;
        $events->title = $request->title;
        $events->content = $request->content;
        if($request->file('myfile') != null){
        $events->myfile = $img_n;
        }
        $events->save();
        $des = 'uploads';
        if($request->file('myfile') != null){
        $img->move($des,$img_n);
        }
        return redirect()->route('events.index');
    }
    public function edit($id){
        $post = events::find($id);
        return view('events.edit' , compact('post'));
    }
    public function update($id, EventsFormRequest $request)
    {
        $post = events::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->update();
        return redirect()->route('events.index');
    }
    public function destroy($id)
    {
        $post = events::findOrFail($id);
        $post->delete();
        return redirect()->route('events.index');
    }
    public function upload(Request $request)
    {
        $file = $request->filesTest;
        $file->move('upload', $file->getClientOriginalName());
    }
}
