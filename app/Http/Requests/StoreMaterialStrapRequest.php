<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialStrapRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Tên chất liệu là bắt buộc.',
            'Name.string' => 'Tên chất liệu phải là chuỗi ký tự.',
            'Name.max' => 'Tên chất liệu không được vượt quá 255 ký tự.',
        ];
    }
}
