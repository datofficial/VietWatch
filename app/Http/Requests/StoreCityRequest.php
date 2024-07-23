<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NameCity' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'NameCity.required' => 'Tên thành phố là bắt buộc.',
            'NameCity.string' => 'Tên thành phố phải là chuỗi ký tự.',
            'NameCity.max' => 'Tên thành phố không được vượt quá 255 ký tự.',
        ];
    }
}
