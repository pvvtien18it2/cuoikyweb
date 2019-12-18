<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
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
            'name'=>'required|',
            'phone'=>'required|min:10|max:10',
            'email'=>'required|',
            'add'=>'required|',
            'come'=>'required|',
            'back'=>'required|',
            'rooms'=>'required|',
            'people'=>'required|'
        ];
    }
    public function messages(){
        return[
            'name.required'=>'phải nhập name',
            'phone.required'=>'phải nhập phone',
            'phone.min'=>'phải nhập 10 ký tự',
            'phone.max'=>'phải nhập 10 ký tự',
            'add.required'=>'phải nhập add',
            'email.required'=>'phải nhập email',
            'come.required'=>'phải nhập come',
            'back.required'=>'phải nhập back',
            'rooms.required'=>'phải chọn phòng',
            'people.required'=>'phải nhập số ngừoi',
        ];
    }
}
  