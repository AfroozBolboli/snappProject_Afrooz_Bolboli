<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|max:255|email|string|unique:customers',
            'phone' => 'required|numeric',
            'password' => 'required|confirmed|min:8'
        ];
    }

}
