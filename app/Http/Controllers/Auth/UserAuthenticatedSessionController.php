<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticatedSessionController extends Controller
{
    // عرض نموذج تسجيل الدخول للمستخدم العادي
    public function create()
    {
        return view('auth.user-login');
    }

    // معالجة تسجيل الدخول للمستخدم العادي
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            // تم تسجيل الدخول بنجاح
            return redirect()->route('user.dashboard');
        } else {
            // فشل تسجيل الدخول
            return back()->withErrors([
                'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
            ]);
        }
    }

    // تسجيل الخروج للمستخدم العادي
    public function destroy()
    {
        Auth::guard('user')->logout();

        return redirect('/user/login');
    }
}
