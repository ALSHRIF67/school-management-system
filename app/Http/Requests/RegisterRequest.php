<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // السماح لأي شخص بالتسجيل
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'user_type'  => 'required|in:student,teacher,employee',
            'password'   => 'required|string|min:6|confirmed',
            'terms'      => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'الاسم الأول مطلوب',
            'last_name.required'  => 'الاسم الأخير مطلوب',
            'email.required'      => 'البريد الإلكتروني مطلوب',
            'email.email'         => 'أدخل بريد إلكتروني صالح',
            'email.unique'        => 'هذا البريد مستخدم مسبقاً',
            'user_type.required'  => 'اختر نوع الحساب',
            'password.required'   => 'كلمة المرور مطلوبة',
            'password.confirmed'  => 'تأكيد كلمة المرور غير مطابق',
            'terms.accepted'      => 'يجب الموافقة على الشروط',
        ];
    }
}
