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
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|email|string|unique:users',
            'phone' => 'required|numeric',
            'password' => ['required', 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'باید اسم خود وارد کنید',
            'email.required' => 'باید ایمیل خود را وارد کنید',
            'phone.required' => 'باید شماره تماس را وارد کنید',
            'password.required' => 'باید رمز خود را وارد کنید',     
            
            'name.max' => 'می توانید حداکثر ۲۵۵ حرف وارد کنید',
            'email.max' => 'می توانید حداکثر ۲۵۵ حرف وارد کنید',
            'name.string' => 'می توانید فقط رشته وارد کنید',
            'email.string' => 'می توانید فقط رشته وارد کنید',

            'email.unique' => 'این ایمیل قبلا استفاده شده است ایمیل دیگری وارد کنید',
            'phone.numeric' => 'در وارد کردن شماره تماس باید از عدد استفاده کنید',
            'password.confirmed' => 'باید رمز خود را تایید کنید',
        ];
    }
}
