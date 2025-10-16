<?php



use App\Http\Controllers\AuthController;
Route::get('/welcome', function () { return view('welcome');});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/teacherdashboard', [AuthController::class, 'teacherDashboard'])
     ->name('teacherDashboard');
     Route::get('/student-dashboard', [AuthController::class, 'studentDashboard'])->name('studentDashboard');

Route::get('/employeedashboard', [AuthController::class, 'employeeDashboard'])
    ->name('employeeDashboard')
    ->middleware('auth');



// Temporary internal debug route to simulate a registration (bypasses CSRF)




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// duplicate closure-based /dashboard route removed; controller-based route above is used

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
