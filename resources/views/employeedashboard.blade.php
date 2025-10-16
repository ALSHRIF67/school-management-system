@extends('welcome')

<section class="py-5">
    <div class="container">
        <div class="card shadow rounded-4 p-4">
            <h2 class="text-center mb-4">لوحة تحكم الموظف</h2>

            <!-- رسائل النجاح أو الخطأ -->
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <!-- معلومات المستخدم -->
            <p>مرحباً، <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>!</p>
            <p>البريد الإلكتروني: <strong>{{ $user->email }}</strong></p>
            <p>نوع الحساب: <strong>{{ ucfirst($user->user_type) }}</strong></p>

            <!-- زر تسجيل الخروج -->
            <div class="mt-4 text-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
                </form>
            </div>
        </div>
    </div>
</section>
