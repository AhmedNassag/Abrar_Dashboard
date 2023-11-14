<?php

namespace App\Http\Requests\AdminDashboard\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'ar_name' => 'required',
            'en_name' => 'required',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'ar_name.required' => 'الإسم بالعربى مطلوب',
            'en_name.required' => 'الإسم بالإنجليزى مطلوب',
        ];
    }
}
