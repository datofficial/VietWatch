<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWatchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name' => 'required|string|max:255',
            'Description' => 'required|string',
            'Engine' => 'required|string|max:255',
            'AvoidWater' => 'required|string|max:255',
            'SizeStrap' => 'required|string|max:255',
            'SizeGlass' => 'required|string|max:255',
            'MaterialGlass' => 'required|string|max:255',
            'IDManufacturer' => 'required|exists:manufacturers,id',
            'IDCategory' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Tên đồng hồ là bắt buộc.',
            'Description.required' => 'Mô tả là bắt buộc.',
            'Engine.required' => 'Động cơ là bắt buộc.',
            'AvoidWater.required' => 'Khả năng chống nước là bắt buộc.',
            'SizeStrap.required' => 'Kích cỡ dây đeo là bắt buộc.',
            'SizeGlass.required' => 'Kích cỡ mặt kính là bắt buộc.',
            'MaterialGlass.required' => 'Chất liệu mặt kính là bắt buộc.',
            'IDManufacturer.required' => 'Nhà sản xuất là bắt buộc.',
            'IDCategory.required' => 'Danh mục là bắt buộc.',
        ];
    }
}
