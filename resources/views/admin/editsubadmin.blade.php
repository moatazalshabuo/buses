@extends('home')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">تعديل بيانات المسؤول الفرعي</h1>

        <form action="{{ route('admin.update', $subAdmin->id) }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">الاسم:</label>
                <input type="text" id="name" name="name" value="{{ $subAdmin->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" value="{{ $subAdmin->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">كلمة المرور الجديدة:</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                <small class="text-gray-600">اتركها فارغة إذا لم تكن ترغب في تغيير كلمة المرور.</small>
            </div>

            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                تحديث
            </button>
        </form>
    </div>
@endsection
