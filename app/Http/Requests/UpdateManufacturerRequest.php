<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManufacturerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Tên nhà sản xuất là bắt buộc.',
            'Name.string' => 'Tên nhà sản xuất phải là chuỗi ký tự.',
            'Name.max' => 'Tên nhà sản xuất không được vượt quá 255 ký tự.',
            'Description.string' => 'Mô tả phải là chuỗi ký tự.',
            'Description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ];
    }
}
