<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status; // عكس الحالة
        $user->save();

        return redirect()->back()->with('success', 'تم تغيير حالة الحساب بنجاح!');
    }

    //deit User Data And Password
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
        'address' => 'nullable|string',
        'college' => 'nullable|string',
        'phone' => 'nullable|string',
        'type' => 'nullable|string',
        'blood_type' => 'nullable|string',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
        $user->password = bcrypt($request->password);
    }
    $user->address = $request->address;
    $user->college = $request->college;
    $user->phone = $request->phone;
    $user->type = $request->type;
    $user->blood_type = $request->blood_type;
    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح!');
}
}
