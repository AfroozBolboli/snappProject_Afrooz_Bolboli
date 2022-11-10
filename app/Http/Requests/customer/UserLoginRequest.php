<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email' => 'required|email|string',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'باید ایمیل خود را وارد کنید',
            'password.required' => 'باید رمز خود را وارد کنید',     
        ];
    }
}
