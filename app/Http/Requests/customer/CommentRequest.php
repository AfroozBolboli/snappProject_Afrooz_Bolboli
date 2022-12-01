<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'food_id' => "required_without:restaurant_id|numeric",
            'restaurant_id' => "required_without:food_id|numeric",
        ];
    }
}
