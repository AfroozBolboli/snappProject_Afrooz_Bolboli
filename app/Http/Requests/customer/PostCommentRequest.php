<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_id' => 'required|numeric',
            'score' => 'required|numeric|between:0,5',
            'comment' => 'required|string'
        ];
    }
}
