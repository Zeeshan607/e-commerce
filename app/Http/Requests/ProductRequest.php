<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
//        'name','slug','description','sku','price', 'sale_price','cost', 'quantity','category_id','subcategory_id','tags','images','attributes','variants',
//        'weight','free_shipping','meta_title','meta_description','meta_keywords',
        switch ($this->method()) {
            case 'POST':
                return [
                    'name'=>'required',
                    'slug'=>'required|alpha_dash|unique:products,id',
                    'featured_image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                    'images' => 'nullable|array',  // Ensure images is an array
                    'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
                    'description'=>'required',
                    'cost'=>'required|numeric|between:0,9999.99',
                    'price'=>'required|numeric|between:0,9999.99',
                    'category_id'=>'required',


                ];
                break;

            case 'PUT':
                return [
                    'name'=>'required',
                    'slug'=>'required|alpha_dash|unique:products,id',
                    'featured_image'=>'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                    'images' => 'nullable|array',  // Ensure images is an array
                    'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
                    'description'=>'required',
                    'price'=>'required',
                    'cost'=>'required|numeric',
                    'category_id'=>'required',


                ];
                break;
        }
        return [];
    }
}
