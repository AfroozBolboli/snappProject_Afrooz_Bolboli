<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminDiscountRequest extends FormRequest
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
            'title' => 'required',
            'restaurant_name' => 'required',
            'price' => 'required',
            'startingDate' => 'required',
            'endingDate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'باید تیتر را وارد کنید',
            'restaurant_name.required' => 'باید اسم رستوران را وارد کنید',     
            'price.required' => 'باید قیمت را وارد کنید',     
            'startingDate.required' => 'باید تاریخ شروع را انتخاب کنید',     
            'endingDate.required' => 'باید تاریخ اتمام را انتخاب کنید',       
        ];
    }
}
