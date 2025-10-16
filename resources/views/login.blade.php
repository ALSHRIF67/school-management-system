@extends('welcome')

<!-- Login Section -->
<section class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card border-0 rounded-4 shadow p-4">
            <h2 class="h3 mb-3 text-center">تسجيل الدخول</h2>
            <p class="text-secondary text-center mb-4">أدخل بياناتك لتسجيل الدخول</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

              

                <!-- البريد الإلكتروني -->
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني" required>
                    <label for="email">البريد الإلكتروني</label>
                </div>
            <!-- نوع المستخدم -->
                <div class="mb-3">
                    <label class="form-label">نوع المستخدم</label>
                    <select class="form-select" name="user_type" required>
                        <option value="">اختر نوع المستخدم</option>
                        <option value="student">طالب</option>
                        <option value="teacher">معلم</option>
                        <option value="employee">موظف</option>

                    </select>
                </div>
                <!-- كلمة المرور -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" required>
                    <label for="password">كلمة المرور</label>
                </div>

                <!-- تذكرني -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-secondary" for="remember">تذكرني</label>
                </div>

                <div class="d-grid mb-3">
                    <button class="btn btn-primary btn-lg" type="submit">تسجيل الدخول</button>
                </div>

                <p class="text-center text-secondary mb-0">
                    ليس لديك حساب؟ 
                    <a href="{{ route('register') }}" class="link-primary text-decoration-none">إنشاء حساب</a>
                </p>
            </form>
        </div>
    </div>
</section>
