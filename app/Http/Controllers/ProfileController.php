<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show()
    {
        // استرجاع البيانات الخاصة بالمستخدم المسجل الحالي
        $user = Auth::user();

        // إعادة عرض قالب العرض الخاص ببيانات المستخدم
        return view('user.profile', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('user.profileedit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    $user = Auth::user();

    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'proof_number' => 'required',
        'type' => 'required',
        'college' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'blood_type' => 'required',

    ]);

    $user->update($validatedData);

    return redirect()->route('user.dashboard')->with('status', 'تم تحديث الملف الشخصي بنجاح');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
