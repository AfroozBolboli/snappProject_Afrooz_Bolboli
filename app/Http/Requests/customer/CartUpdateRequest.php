<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'food_id' => 'required|numeric',
            'count' => 'required|numeric',
            'trackingCode' => 'required|string'
        ];
    }
}
