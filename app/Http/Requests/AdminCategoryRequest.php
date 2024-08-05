<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
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
            'nameCate' => 'required | max:30',
        ];
    }
    public function messages(): array{
        return[
            'nameCate.required' => 'Tên danh mục không được để trống',
            'nameCate.max' => 'Tên danh mục chỉ được tối đa 30 kí tự'
        ];
    }
}
