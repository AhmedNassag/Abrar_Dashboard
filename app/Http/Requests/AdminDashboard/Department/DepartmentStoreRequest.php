<?php

namespace App\Http\Requests\AdminDashboard\Department;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentStoreRequest extends FormRequest
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
            'ar_name' => 'required|unique:a_departments,ar_name',
            'en_name' => 'required|unique:a_departments,en_name',
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
            'ar_name.unique' => 'الإسم بالعربى موجود بالفعل مسبقاً',
            'en_name.required' => 'الإسم بالإنجليزى مطلوب',
            'en_name.unique' => 'الإسم بالإنجليزى موجود بالفعل مسبقاً',
        ];
    }
}
