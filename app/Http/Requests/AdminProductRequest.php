<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
            'nameProduct' => 'required | max:100',
            'priceProduct' => 'required | numeric | min:10000',
            'desc' => 'nullable | max:500'
        ];
    }
    public function messages(): array{
        return[
            'nameProduct.required' => 'Tên sản phẩm không được để trống',
            'nameProduct.max' => 'Tên sản phẩm không được quá 100 kí tự',
            'priceProduct.required' => 'Giá sản phẩm không được để trống',
            'priceProduct.numeric' => 'Giá sản phẩm phải viết bằng số',
            'priceProduct.min' => 'Giá sản phẩm phải trên 10000',
            'desc.max' => 'Mô tả không được quá 500 kí tự'
        ];
    }
}
