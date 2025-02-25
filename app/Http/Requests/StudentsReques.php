<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsReques extends FormRequest
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
        //  quy tắc kiểm tra dữ liệu
        return [
            'name' => 'required|max:255|string',
            'age' => 'numeric',
            'date' => 'date',
            'phone' => 'numeric',
            'web' => 'string',
            'address' => 'string'
        ];
    }
    
    public function messages() {
        // Tùy chỉnh thông báo lỗi khi dữ liệu không hợp lệ.
        return [
            'name.string' => 'Please enter the correct name',
            'name.max' => 'The name cannot exceed 255 characters',
            'name.required' => 'The name field is required',
            'age.numeric' => 'Please enter the correct age',
            'date.date' => 'Please enter a valid date',
            'phone.numeric' => 'Please check the phone number again',
            'web.string' => 'Please check the character again',
            'address.string' => 'Please enter address again'
        ];
    }
}    
