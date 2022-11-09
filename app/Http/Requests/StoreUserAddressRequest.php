<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'address' => 'required|max:500',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'باید عنوان این آدرس را وارد کنید',
            'address.required' => 'باید آدرس را وارد کنید',
            'latitude.required' => 'باید عرض جغرافیایی را وارد کنید',
            'longitude.required' => 'باید طول جغرافیایی را وارد کنید',
        ];
    }
}
