<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
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
            'Name.required' => 'Tên màu là bắt buộc.',
            'Name.string' => 'Tên màu phải là chuỗi ký tự.',
            'Name.max' => 'Tên màu không được vượt quá 255 ký tự.',
        ];
    }
}
