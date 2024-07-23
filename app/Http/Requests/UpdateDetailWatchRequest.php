<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailWatchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Price' => 'required|numeric',
            'IDWatch' => 'required|exists:watches,id',
            'IDMaterialStrap' => 'required|exists:material_straps,id',
            'IDColor' => 'required|exists:colors,id',
        ];
    }

    public function messages()
    {
        return [
            'Price.required' => 'Giá là bắt buộc.',
            'Price.numeric' => 'Giá phải là số.',
            'IDWatch.required' => 'Vui lòng chọn đồng hồ.',
            'IDWatch.exists' => 'Đồng hồ không hợp lệ.',
            'IDMaterialStrap.required' => 'Vui lòng chọn dây đeo.',
            'IDMaterialStrap.exists' => 'Dây đeo không hợp lệ.',
            'IDColor.required' => 'Vui lòng chọn màu sắc.',
            'IDColor.exists' => 'Màu sắc không hợp lệ.',
        ];
    }
}
