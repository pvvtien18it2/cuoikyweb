<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'name'=>'required|min:10',
            'content'=>'required|min:20',
            'myfile'=>'required|image'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.required'=>'phải nhập tiêu đề',
            'content.required'=>'phải nhập nội dung',
            'title.min'=>'phải nhập trên 10 ký tự',
            'content.min'=>'phải nhập trên 20 ký tự'
            ];
    }
}
