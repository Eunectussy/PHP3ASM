<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //kiểm tra quyền đăng nhập
    {
        return true; //sửa từ false thành true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'bail|required|email|exists:users,email',
            'password' => 'required|min:8'
        ];
    }
    public function messages(): array{
        return[
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'password.min:8' => 'Password phải dài hơn 8 kí tự'
        ];
    }
}
