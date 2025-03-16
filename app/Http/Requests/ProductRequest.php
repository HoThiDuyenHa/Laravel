<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép request được xử lý
    }

    public function rules()
    {
        return [
            'inputName' => 'required|string|max:255',
            'inputPrice' => 'required|numeric|min:10000',
            'inputPromotionPrice' => 'nullable|numeric|min:10000',
            'inputUnit' => 'required|string|max:50',
            'inputNew' => 'required|integer|min:0|max:1',
            'inputType' => 'required|string|max:50',
            'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'inputDescription' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'inputName.required' => 'Vui lòng nhập tên sản phẩm.',
            'inputPrice.required' => 'Vui lòng nhập giá sản phẩm.',
            'inputPrice.numeric' => 'Giá phải là một số.',
            'inputPrice.min' => 'Giá phải lớn hơn hoặc bằng 10,000.',
            'inputImage.required' => 'Vui lòng chọn ảnh sản phẩm.',
            'inputImage.image' => 'Tệp phải là hình ảnh.',
            'inputImage.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'inputImage.max' => 'Ảnh không được vượt quá 2MB.',
            'inputDescription.required' => 'Vui lòng nhập mô tả sản phẩm.',
        ];
    }
}
