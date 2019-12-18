<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GhiChuRequest extends FormRequest
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
            'tenP' =>'required',
            'note' =>'required',
        ];
    }
    public function messages(){
        return[
            'tenP.required' => 'Vui lòng nhập tên phòng',
            'note.required' => 'Vui lòng nhập ghi chú',
        ];
    }
}
