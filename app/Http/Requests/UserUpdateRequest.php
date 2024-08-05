<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'emailUser' => 'required|email', 
            'nameUser' => 'required|max:50',
            'password' => 'required|min:8 ',
        ];

    }
    public function messages(): array{
        return[
            'nameUser.required' => 'Tên người dùng không được để trống',
            'nameUser.max' => 'Tên người dùng không được quá 50 kí tự',
            'emailUser.required' => 'Email không được để trống',
            'emailUser.email' => 'Email không đúng định dạng',
            'emailUser.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải nhiều hơn 8 kí tự'
        ];
    }
    
}
