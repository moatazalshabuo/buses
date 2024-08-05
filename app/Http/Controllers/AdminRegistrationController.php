<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminRegistrationController extends Controller
{
    public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:sub-admin', // إضافة تحقق من الدور
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // تعيين الدور
        ]);

        return redirect()->route('sub.admins')->with('success', 'تم تسجيل المسؤول بنجاح!');
    }

// انشاء حساب للادمن الرئيسي
public function showRegistrationForm()
{
    return view('admin.registeradmin');
}

public function registerAdmin(Request $request)
{
    // تحقق من البيانات المدخلة
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:admins|max:255',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:admin',
    ]);

    // إنشاء حساب مسؤول رئيسي جديد
    Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('admin.login')->with('success', 'تم تسجيل المسؤول الرئيسي بنجاح!');
}
}
