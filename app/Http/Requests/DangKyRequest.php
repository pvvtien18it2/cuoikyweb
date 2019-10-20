<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required|unique:users,name',
            'email'=>'required|unique:users,email',
            'pass' =>'required|min:8',
            're_pass'=>'required|same:pass',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Vui lòng nhâp tên đăng nhập',
            'name.sodienthoai'=>'Vui lòng nhâp số điện thoại',
            'name.unique'  =>'Tên đăng nhập đã tồn tại',
            'email.required'=>'Vui lòng nhập email',
            'email.unique'  =>'Email đã tồn tại',
            'pass.required' =>'Vui lòng nhập mật khẩu',
            'pass.min'      =>'Vui lòng đặt mật khẩu ít nhất 8 ký tự',
            're_pass.required'=>'Vui lòng nhập lại mật khẩu',
            're_pass.same'  =>'Bạn đã nhập sai nật khẩu'
        ];

    }
}
