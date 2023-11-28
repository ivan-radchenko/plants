<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => 'required | string | min:3 | max:20 ',
            'email' => 'required | email | unique:users',
            'password' => 'required | string | min:6 | max:20 ',
            'image'=> 'sometimes |nullable|image|mimes:jpg,jpeg,png| max: 5500'
        ];
    }
}