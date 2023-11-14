<?php

namespace App\Http\Requests\AdminDashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'first_name'                => 'required|string|min:3',
            'last_name'                 => 'required|string|min:3',
            'Country_id'                => 'required|integer|exists:a_countries,id',
            'busy'                      => 'required',
            'age'                       => 'required|numeric|gte:1',
            'credit'                    => 'required',
            'active'                    => 'required',
            'email'                     => 'required|email',
            'img'                       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone'                     => 'required|numeric|regex:/(01)[0-9]{9}/',
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
            'first_name.required'       => 'الإسم الأول مطلوب',
            'first_name.string'         => 'الإسم الأول يجب أن يكون نص',
            'first_name.min'            => 'الإسم الأول يجب ألا يقل عن 3 حروف',
            'last_name.required'        => 'الإسم الأخير مطلوب',
            'last_name.string'          => 'الإسم الأخير يجب أن يكون نص',
            'last_name.min'             => 'الإسم الأخير يجب ألا يقل عن 3 حروف',
            'Country_id.required'       => 'البلد مطلوب',
            'Country_id.integer'        => 'رقم البلد يجب أن يكون رقم',
            'Country_id.exists'         => 'البلد يجب أن يكون موجود بجدول البلدان',
            'busy.required'             => 'حالة الإنشغال مطلوبة',
            'age.required'              => 'السن مطلوب',
            'age.numeric'               => 'السن يجب أن يكون رقم',
            'age.gte'                   => 'السن يجب أن يكون أكبر من أو يساوي 1',
            'credit.required'           => 'الدفع مطلوب',
            'active.required'           => 'الحالة مطلوبة',
            'email.required'            => 'البريد الإلكترونى مطلوب',
            'email.email'               => 'البريد الإلكترونى يجب أن يكون من نوع الإيميل',
            'img.image'                 => 'الصورة يجب أن تكون من نوع الصورة',
            'img.mimes'                 => 'صيغة الصورة غير صحيحة',
            'phone.required'            => 'رقم التليفون مطلوب',
            'phone.numeric'             => 'رقم التليفون يجب أن يكون رقم',
            // 'phone.size'             => 'رقم التليفون يجب ألا يزيد عن 11 رقم',
            'phone.regex'               => 'رقم التليفون يجب أن يبدأ 01',
            
        ];
    }
}
