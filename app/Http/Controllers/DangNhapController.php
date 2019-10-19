<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
class DangNhapController extends Controller
{
    public function dangnhap(){
        return view('dangnhap');
    }
    public function postdangnhap(DangNhapRequest $request){
        $arr = array('name'=> $request->your_name,
                    'password'=>$request->your_pass
            );
        if (Auth::attempt($arr)){
            echo 'Đăng nhập thành công';
        }
        else{
            return view('dangnhap',['error'=>'Tên đăng nhập hoặc mật khẩu không đúng']);
        }
    }
}
