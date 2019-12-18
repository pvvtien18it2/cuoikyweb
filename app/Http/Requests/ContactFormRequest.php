<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'email'=>'required|',
            'mess'=>'required|',
        ];
    }
        public function messages(){
            return[
                'name.required'=>'phải nhập name',
                'mess.required'=>'phải nhập ý kiến',
                'email.required'=>'phải nhập email',
            ];
    }
}