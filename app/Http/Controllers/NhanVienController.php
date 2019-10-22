<?php

namespace App\Http\Controllers;
use App\Http\Requests\DangKyRequest;
use App\nhanvien;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien = nhanvien::all();
        return view('dashboard.manager.manager',compact('nhanvien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.dangky');
    }
    public function store(DangKyRequest $request)
    {
        $nhanvien = new nhanvien();
        if ($request->pass === $request->re_pass){
            $nhanvien->name = $request->name;
            $nhanvien->phone = $request->phone;
            $nhanvien->email = $request->email;
            $nhanvien->password = Hash::make($request->pass);
            $nhanvien->remember_token = $request->_token;
            $nhanvien->admin = $request->admin;
            $nhanvien->save();
            return redirect().route('nhanvien.index');
        }
        else{
            return view('member.dangky');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = nhanvien::findOrFail($id);
        $nhanvien->delete();
        return redirect()->route('nhanvien.index');
    }
}
