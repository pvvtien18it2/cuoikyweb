<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
// use App\create_blog_table;
use App\Blog;
use App\Http\Requests\BlogFormRequest;

class blogController extends Controller
{
    public function index(){
        $blog = Blog::latest()->paginate(5);
        return view('a.index' , compact('blog'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function show($id){
        $page = Blog::find($id);
        return view('a.show')->with('page',$page);
    }

    public function store(BlogFormRequest $request)
    {
        $create_blog_table = new Blog;
        $create_blog_table->name = $request->name;
        $create_blog_table->phone = $request->phone;
        $create_blog_table->email = $request->email;
        $create_blog_table->add = $request->add;
        $create_blog_table->come = $request->come;
        $create_blog_table->back = $request->back;
        $create_blog_table->rooms = $request->rooms;
        $create_blog_table->people = $request->people;
        $create_blog_table->save();
        return view('b.tcphong');
    }

    public function edit($id){
        $post = Blog::find($id);
        return view('a.edit',compact('post'));
    }
    public function update($id, BlogFormRequest $request)
    {
        $post = Blog::find($id);
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->add = $request->add;
        $post->come = $request->come;
        $post->back = $request->back;
        $post->rooms = $request->rooms;
        $post->people = $request->people;
        $post->update();
        return redirect()->route('post.index');
    }
    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
