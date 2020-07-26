<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required',
            'category_image' => 'required_without:id|mimes:jpeg,bmp,png',
        ];
    }
    public function messages()
    {
        // Custom Error messages
        return [
            'required' => 'This field is required',
            // 'max' => 'The length is 150 letters only ',
            'required_without' => 'This field is reqiured',
        ];
    }
}
