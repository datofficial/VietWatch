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
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Quantity' => 'required|integer|min:0',
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
            'Image.required' => 'Hình ảnh là bắt buộc.',
            'Image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'Image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'Image.max' => 'Hình ảnh không được vượt quá 2048 KB.',
            'Quantity.required' => 'Số lượng là bắt buộc.',
            'Quantity.integer' => 'Số lượng phải là số nguyên.',
            'Quantity.min' => 'Số lượng không được nhỏ hơn 0.',
        ];
    }
}
