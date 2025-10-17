<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\tempcontroller;
use App\Http\Controllers\TeacherStudentController;

// ====================
// صفحات عامة
// ====================
Route::get('/welcome', function () { 
    return view('welcome'); 
});

Route::get('/bodyhome', function () { 
    return view('bodyhome'); 
});

Route::get('/home', [tempcontroller::class, 'index']);

// ====================
// تسجيل وحسابات المستخدمين
// ====================
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ====================
// لوحات التحكم
// ====================
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/teacherdashboard', [AuthController::class, 'teacherDashboard'])->name('teacherDashboard');
Route::get('/student-dashboard', [AuthController::class, 'studentDashboard'])->name('studentDashboard');
Route::get('/employeedashboard', [AuthController::class, 'employeeDashboard'])
    ->middleware('auth')
    ->name('employeeDashboard');

// ====================
// Navbar view
// ====================
Route::get('/navbar', function () {
    return view('navbar');
});

// ====================
// مسارات إدارة الطلاب للمعلم
// ====================
Route::prefix('teacher')->middleware(['auth'])->group(function () {

    // عرض قائمة الطلاب
    Route::get('/students', [TeacherStudentController::class, 'index'])->name('teacher.students');

    // إضافة طالب جديد
    Route::post('/students/add', [TeacherStudentController::class, 'store'])->name('teacher.students.add');

    // حذف طالب
    Route::delete('/students/remove/{id}', [TeacherStudentController::class, 'destroy'])->name('teacher.students.remove');

    // صفحة الطلاب الرئيسية
    Route::get('/studentTable', function () {
        return view('studentTable'); // تأكد من وجود resources/views/studentTable.blade.php
    })->name('teacher.studentTable');

    // عرض وتحديث نتائج الطالب
    Route::get('/students/results/{id}', [TeacherStudentController::class, 'results'])->name('teacher.students.results');
    Route::post('/students/results/{id}', [TeacherStudentController::class, 'updateResults'])->name('teacher.students.results.update');

    // عرض الواجبات
    Route::get('/students/homeworks/{id}', [TeacherStudentController::class, 'homeworks'])->name('teacher.students.homeworks');

    // تبديل حالة الواجب (تم التسليم / لم يتم)
    Route::post('/students/toggle-submission', [TeacherStudentController::class, 'toggleSubmission'])->name('teacher.students.toggleSubmission');
});

// ====================
// Route تجريبي لمشاهدة صفحة الطلاب بدون تسجيل دخول
// ====================
Route::get('/teacher/demo-students', [TeacherStudentController::class, 'index']);
