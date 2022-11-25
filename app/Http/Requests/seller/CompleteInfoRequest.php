<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class CompleteInfoRequest extends FormRequest
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
            'phone' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'accountNumber' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'باید اسم رستوران را وارد کنید',
            'phone.required' => 'باید شماره تماس رستوران را وارد کنید',     
            'address.required' => 'باید آدرس را وارد کنید', 
            'latitude.required' => 'باید عرض جغرافیایی را وارد کنید', 
            'longitude.required' => 'باید طول جغرافیایی را وارد کنید', 
            'accountNumber.required' => 'باید شماره حساب رستوران کنید',          
        ];
    }
}
