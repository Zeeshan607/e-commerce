<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name'=>'required',
                    'slug'=>'required|alpha_dash|unique:categories',
                    'image'=>'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                    'description'=>'request',

                ];
                break;

            case 'PUT':
                return [
                    'name'=>'required',
                    'slug'=>'required|alpha_dash|unique:categories',
                    'image'=>'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                    'description'=>'request'
                ];
                break;
        }

    }
}
