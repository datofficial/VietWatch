<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentMethodRequest extends FormRequest
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
            'Name.required' => 'Tên phương thức thanh toán là bắt buộc.',
            'Name.string' => 'Tên phương thức thanh toán phải là chuỗi ký tự.',
            'Name.max' => 'Tên phương thức thanh toán không được vượt quá 255 ký tự.',
        ];
    }
}
