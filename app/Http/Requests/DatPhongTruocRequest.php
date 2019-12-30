<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatPhongTruocRequest extends FormRequest
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
            'txtName' =>'required',
            'txtCMND' => 'required|numeric|max:999999999',
            'txtNumber' => 'required|numeric',
            'txtCallNumber' => 'required|numeric',
            'txtBookRoom' => 'required',
            'txtOutRoom' => 'required',
        ];
    }

    public function messages(){
        return[
            'txtName.required' => 'Vui lòng nhập họ và tên',
            'txtCMND.required' => 'Vui lòng nhập số chứng minh nhân dân',
            'txtCMND.numeric'  => 'Chứng minh nhân dân là chuổi các số',
            'txtCMND.max'  => 'Chứng minh nhân dân là chuổi 9 chữ số',
            'txtNumber.required' => 'Vui lòng nhập số người cùng chung phòng',
            'txtNumber.numeric' => 'Số người ở là số',
            'txtCallNumber.required' => 'Vui lòng nhập họ và tên',
            'txtBookRoom.required' => 'Vui lòng nhập ngày đến',
            'txtCallNumber.numeric'  => 'Số điện thoại là chuổi các số',
            'txtOutRoom.required' => 'Vui lòng nhập ngày đi',
        ];
    }
}
