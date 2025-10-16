@extends('welcome')
<section class="bg-light py-5">
<div class="container">
<div class="row justify-content-center align-items-center">
<div class="col-12 col-md-8 col-lg-6">
<div class="card shadow rounded-4 p-4">
<h3 class="text-center mb-2">تسجيل حساب جديد</h3>
<p class="text-center text-secondary mb-4">اختر نوع الحساب وأدخل بياناتك</p>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="first_name" placeholder="الاسم الأول" required>
        <label>الاسم الأول</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="last_name" placeholder="الاسم الأخير" required>
        <label>الاسم الأخير</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
        <label>البريد الإلكتروني</label>
    </div>

    <div class="mb-3">
        <label>نوع الحساب</label>
        <select class="form-select" name="user_type" required>
            <option value="">اختر نوع الحساب</option>
            <option value="student">طالب</option>
            <option value="teacher">معلم</option>
            <option value="employee">موظف</option>
        </select>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
        <label>كلمة المرور</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
        <label>تأكيد كلمة المرور</label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="terms" required>
        <label class="form-check-label">أوافق على الشروط والأحكام</label>
    </div>

    <button class="btn btn-primary btn-lg w-100" type="submit">تسجيل الحساب</button>
</form>
</div>
</div>
</div>
</div>
</section>
