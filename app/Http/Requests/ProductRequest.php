<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat_id' => 'required',
            'prod_name' => 'required|unique:products',
            'prod_desc' => 'required',
            'prod_price' => 'required|numeric',
            'prod_image' => 'required_without:id|mimes:jpeg,bmp,png',
        ];
    }
    public function messages()
    {
        return [
            'unique'=>'This product is already exist',
            'required' => 'This field is reqiured',
            'numeric' => 'This field must be in numbers',
            'required_without' => 'This field is reqiured in create only',
        ];
    }
}
