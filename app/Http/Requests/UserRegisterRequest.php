<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'mobile_no' => ['required', 'numeric'],
            'address' => ['required', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'required' => 'This field is required',
            'string' => 'This field should be characters',
            'max' => 'The maximum characters is 255',
            'numeric' => 'This field should be numbers only',
        ];
    }
}
