<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistrictRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'NameDistrict' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => 'Thành phố là bắt buộc.',
            'city_id.exists' => 'Thành phố không tồn tại.',
            'NameDistrict.required' => 'Tên quận/huyện là bắt buộc.',
            'NameDistrict.string' => 'Tên quận/huyện phải là chuỗi ký tự.',
            'NameDistrict.max' => 'Tên quận/huyện không được vượt quá 255 ký tự.',
        ];
    }
}

