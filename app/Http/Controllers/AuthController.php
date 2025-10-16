<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // إعادة التوجيه حسب نوع المستخدم
            switch ($user->user_type) {
                case 'teacher':
                    $route = 'teacherDashboard';
                    break;
                case 'student':
                    $route = 'studentDashboard';
                    break;
                case 'employee':
                    $route = 'employeeDashboard';
                    break;
                default:
                    $route = 'dashboard';
                    break;
            }

            return redirect()->route($route)->with('success', 'تم تسجيل الدخول بنجاح 🎉');
        }

        return back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'user_type'  => $request->user_type,
            'terms'      => true,
        ]);

        Auth::login($user);

        // إعادة التوجيه حسب نوع المستخدم بعد التسجيل
        switch ($user->user_type) {
            case 'teacher':
                $route = 'teacherDashboard';
                break;
            case 'student':
                $route = 'studentDashboard';
                break;
            case 'employee':
                $route = 'employeeDashboard';
                break;
            default:
                $route = 'dashboard';
                break;
        }

        return redirect()->route($route)->with('success', 'تم إنشاء الحساب بنجاح 🎉');
    }

    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $user = auth()->user(); // تمرير المستخدم الحالي للعرض
        return view('dashboard', compact('user'));
    }

    public function teacherDashboard()
    {
        if (!auth()->check() || auth()->user()->user_type !== 'teacher') {
            return redirect()->route('login')->with('error', 'غير مسموح بالدخول لهذه الصفحة');
        }

        $user = auth()->user();
        return view('teacherdashboard', compact('user'));
    }

    public function studentDashboard()
    {
        if (!auth()->check() || auth()->user()->user_type !== 'student') {
            return redirect()->route('login')->with('error', 'غير مسموح بالدخول لهذه الصفحة');
        }

        $user = auth()->user();
        return view('studentdashboard', compact('user'));
    }

   public function employeeDashboard()
{
    $user = auth()->user();
    return view('employeedashboard', compact('user'));
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
