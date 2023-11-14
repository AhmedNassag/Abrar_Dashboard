<?php

namespace App\Http\Requests\AdminDashboard\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
            'name'                        => 'required',
            'date'                        => 'required|date|after_or_equal:today',
            'time'                        => 'required',
            'teacher_id'                  => 'required|integer|exists:a_teachers,id',
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
            'date.required'                 => 'التاريخ مطلوب',
            'date.date'                     =>  'صيغة التاريخ غير صحيحة',
            'date.after_or_equal'           =>  'التاريخ يجب أن يكون اليوم أو فى يوم قادم',
            'time.required'                 =>  'الوقت مطلوب',
            'teacher_id.required'           =>  'رقم المعلم مطلوب',
            'teacher_id.integer'            =>  'رقم المعلم يجب أن يكون رقم',
            'teacher_id.exists'             =>  'رقم المعلم يجب أن يكون موجود بجدول المعلمين',
        ];
    }
}
