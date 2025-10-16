<!-- resources/views/student-dashboard.blade.php -->

@extends('welcome')


<section class="py-5">
    <div class="container">
        <div class="card shadow rounded-4 p-4">
            <h2 class="text-center mb-4">لوحة تحكم الطالب</h2>

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

            <p>مرحباً، <strong>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</strong>!</p>
            <p>البريد الإلكتروني: <strong>{{ auth()->user()->email }}</strong></p>
            <p>نوع الحساب: <strong>{{ ucfirst(auth()->user()->user_type) }}</strong></p>

            <div class="mt-4 text-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
                </form>
            </div>
        </div>
    </div>
</section>

