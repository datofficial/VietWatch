<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'Name.required' => 'Tên danh mục là bắt buộc.',
            'Name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'Name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'Description.string' => 'Mô tả phải là chuỗi ký tự.',
            'Description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ];
    }
}
