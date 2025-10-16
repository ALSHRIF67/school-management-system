@extends('welcome')

<div class="container mt-5">
    <h2>لوحة تحكم المعلم</h2>
    <p>مرحبًا بك {{ auth()->user()->first_name }}!</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
    </form>
</div>
