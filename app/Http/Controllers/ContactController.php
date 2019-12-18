<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\contacts;
use App\contact;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function index(){
        $contact = contact::latest()->paginate(5);
        return view('contact.index' , compact('contact'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function show($id){
        $page = contact::find($id);
        return view('contact.show')->with('page',$page);
    }

    public function store(ContactFormRequest $request)
    {
        $contacts = new contact;
        $contacts ->name = $request->name;
        $contacts ->email= $request->email;
        $contacts->mess = $request->mess;
        $contacts->save();
        return view('b.tcgy');
    }
}
