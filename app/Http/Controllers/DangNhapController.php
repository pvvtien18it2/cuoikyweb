<?php

namespace App\Http\Controllers;
use App\phong;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
class DangNhapController extends Controller
{
    public function dangnhap(){
        return view('member.dangnhap');
    }
    public function postdangnhap(DangNhapRequest $request){
        $arr = array(
            'name'=>$request->your_name,
            'password'=>$request->your_pass
        );
        if (Auth::attempt($arr)){
//            return view('dashboard.manager.manager');
            $user = Auth::user();
            if ($user->admin == 1){
                return redirect('manager');
            }
            else{
                return redirect('employee');
            }
        }
        else{
            return view('member.dangnhap',["error"=>'Tên đăng nhập hoặc mật khẩu đã sai']);
        }
    }
}




