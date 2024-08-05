<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserRegistrationController extends Controller
{
    public function create()
    {
        return view('user.register'); // استعراض نموذج التسجيل
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'proof_number' => 'required',
            'type' => 'required',
            'college' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'blood_type' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->proof_number = $request->proof_number;
        $user->type = $request->type;
        $user->college = $request->college;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->blood_type = $request->blood_type;
        $user->save();

        return redirect()->route('user.login')->with('success', 'تم تسجيل المستخدم بنجاح!');
    }

}
