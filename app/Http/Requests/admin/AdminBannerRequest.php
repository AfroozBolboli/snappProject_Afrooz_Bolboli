<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminBannerRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'باید تیتر را وارد کنید',
            'image.required' => 'باید عکس را آپلود کنید',     
            'image.mimes' => 'فورمت قابل قبول jpg,png,jpeg',     
            'image.max' => 'حجم باید کمتر از ۵۰۴۸ کیلوبایت باشد',     
        ];
    }
}
