<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThuePhongRequest extends FormRequest
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
            'txtCMND' => 'required|numeric',
            'txtNumber' => 'required|numeric'
        ];
    }
    public function messages(){
        return[
            'txtName.required' => 'Vui lòng nhập họ và tên',
            'txtCMND.required' => 'Vui lòng nhập số chứng minh nhân dân',
            'txtCMND.numeric'  => 'Chứng minh nhân dân là chuổi các số',
            'txtNumber.required' => 'Vui lòng nhập số người cùng chung phòng',
            'txtNumber.numeric' => 'Vui lòng nhập chử số'
        ];
    }
}
