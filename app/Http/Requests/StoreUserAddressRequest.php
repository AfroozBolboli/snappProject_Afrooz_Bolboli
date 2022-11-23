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
}
