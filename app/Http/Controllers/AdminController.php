<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // إضافة هذا السطر
class AdminController extends Controller
{
    public function showSubAdmins()
    {
        $subAdmins = Admin::where('role', 'sub-admin')->get();
        return view('admin.subadmin', compact('subAdmins'));
    }
    public function edit($id)
    {
        $subAdmin = Admin::findOrFail($id);
        return view('admin.editsubadmin', compact('subAdmin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // إضافة تحقق لكلمة المرور
        ]);

        $subAdmin = Admin::findOrFail($id);
        $subAdmin->name = $request->input('name');
        $subAdmin->email = $request->input('email');

        // تحديث كلمة المرور إذا تم تقديمها
        if ($request->filled('password')) {
            $subAdmin->password = Hash::make($request->input('password'));
        }

        $subAdmin->save();

        return redirect()->route('sub.admins')->with('success', 'تم تحديث البيانات بنجاح');
    }

    //delete Sub Admin

    public function destroy($id)
{
    $subAdmin = Admin::findOrFail($id);
    $subAdmin->delete();

    return redirect()->route('sub.admins')->with('success', 'تم حذف المسؤول الفرعي بنجاح');
}
}
