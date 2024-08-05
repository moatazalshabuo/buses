@extends('home')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 mx-4 bg-white rounded-md shadow-md">
            <h2 class="mb-6 text-3xl font-semibold text-center">تسجيل مسؤول جديد</h2>
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">الاسم:</label>
                    <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
                    <input type="email" name="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">كلمة المرور:</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">تأكيد كلمة المرور:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">الدور:</label>
                    <select name="role" id="role" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        <option value="sub-admin">مسؤول فرعي</option>
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 text-white transition-colors duration-300 bg-blue-500 rounded-md hover:bg-blue-600">تسجيل</button>
                @if(session('success'))
                <div class="mt-4 px-4 py-2 text-white bg-green-500 rounded-md">
                    {{ session('success') }}
                </div>
                @endif
            </form>
        </div>
    </div>
@endsection
