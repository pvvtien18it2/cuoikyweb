<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DangKyRequest;
class DangKyController extends Controller
{
    public function dangky(){
        return view('member.dangky');
    }
    public function  postdangky(DangKyRequest $request){
        $member = new User();
        if ($request->pass === $request->re_pass){
            $member->name = $request->name;
            $member->phone = $request->phone;
            $member->email = $request->email;
            $member->password = Hash::make($request->pass);
            $member->remember_token = $request->_token;
            $member->admin = $request->admin;
            $member->save();
            return redirect()->route('getdangky');
        }
        else{
            return view('member.dangky');
        }
    }
}
