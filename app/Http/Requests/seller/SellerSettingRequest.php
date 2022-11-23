<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class SellerSettingRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'shippingCost' => 'required',
            'categories' => 'required',
            'status' => 'required'
        ];
    }

}
