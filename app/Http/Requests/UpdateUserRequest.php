<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NameUser' => 'required|string|max:255',
            'Password' => 'nullable|string|max:255',
            'PhoneNumber' => 'required|string|max:15',
            'Email' => 'required|string|email|max:255',
            'Role' => 'required|string|max:255',
            'IDCity' => 'required|exists:cities,id',
            'IDDistrict' => 'required|exists:districts,id',
            'IDWard' => 'required|exists:wards,id',
            'Address' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'NameUser.required' => 'Tên người dùng là bắt buộc.',
            'Password.required' => 'Mật khẩu là bắt buộc.',
            'PhoneNumber.required' => 'Số điện thoại là bắt buộc.',
            'Email.required' => 'Email là bắt buộc.',
            'Role.required' => 'Vai trò là bắt buộc.',
            'IDCity.required' => 'Thành phố là bắt buộc.',
            'IDDistrict.required' => 'Quận/Huyện là bắt buộc.',
            'IDWard.required' => 'Xã/Phường là bắt buộc.',
            'Address.required' => 'Địa chỉ là bắt buộc.',
        ];
    }
}
