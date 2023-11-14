<?php

namespace App\Http\Requests\AdminDashboard\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherUpdateRequest extends FormRequest
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
            'name'                         => 'required',
            'email'                        => 'required|email'/*|unique:a_teachers,email*/,
            'img'                          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'abstract'                     => 'required',
            'certificate'                  => 'required',
            'Achievement'                  => 'required',
            'languages'                    => 'required',
            'phone'                        => 'required|numeric|regex:/(01)[0-9]{9}/'/*|unique:a_teachers,phone*/,
            'busy'                         => 'required',
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
            'name.required'                 => 'الإسم مطلوب',
            'email.required'                => 'البريد الإلكترونى مطلوب',
            'email.email'                   => 'البريد الإلكترونى يجب أن يكون من نوع الإيميل',
            // 'email.unique'               => 'الإيميل موجود بالفعل مسبقاً',
            'img.image'                     => 'الصورة يجب أن تكون من نوع الصورة',
            'img.mimes'                     => 'صيغة الصورة غير صحيحة',
            'abstract.required'             => 'النبذة مطلوبة',
            'certificate.required'          => 'الشهادات مطلوبة',
            'Achievement.required'          => 'الإنجازات مطلوبة',
            'languages.required'            => 'اللغات مطلوبة',
            'phone.required'                => 'رقم التليفون مطلوب',
            'phone.numeric'                 => 'رقم التليفون يجب أن يكون رقم',
            // 'phone.unique'               => 'رقم التليفون موجود بالفعل مسبقاً',
            'phone.regex'                   => 'رقم التليفون يجب أن يبدأ 01',
            'busy.required'                 => 'حالة الإنشغال مطلوبة',
        ];
    }
}
