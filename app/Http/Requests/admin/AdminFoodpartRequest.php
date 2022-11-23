<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminFoodpartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'food_id' => 'required',
            'discount' => 'required',
            'date' => 'required',
            'time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'food_id.required' => 'باید آیدی غذا را وارد کنید',
            'discount.required' => 'باید میزان تخفیف را وارد کنید',
            'date.required' => 'باید روز را وارد کنید',
            'time.required' => 'باید زمان را انتخاب کنید',          
        ];
    }
}
