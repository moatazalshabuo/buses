<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticatedSessionController extends Controller
{
    // عرض نموذج تسجيل الدخول للمشرف
    // عرض نموذج تسجيل الدخول للمشرف
    public function create()
    {
        return view('auth.admin-login');
    }

    // معالجة تسجيل الدخول للمشرف
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // تم تسجيل الدخول بنجاح
            return redirect()->route('admin.dashboard');
        } else {
            // فشل تسجيل الدخول
            return back()->withErrors([
                'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
            ]);
        }
    }

    // تسجيل الخروج للمشرف
    public function destroy()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
}
