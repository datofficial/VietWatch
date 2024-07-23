<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'district_id' => 'required|exists:districts,id',
            'NameWard' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'district_id.required' => 'Quận/huyện là bắt buộc.',
            'district_id.exists' => 'Quận/huyện không tồn tại.',
            'NameWard.required' => 'Tên phường/xã là bắt buộc.',
            'NameWard.string' => 'Tên phường/xã phải là chuỗi ký tự.',
            'NameWard.max' => 'Tên phường/xã không được vượt quá 255 ký tự.',
        ];
    }
}

