<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مسؤول رئيسي</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 mx-4 bg-white rounded-md shadow-md">
            <h2 class="mb-6 text-3xl font-semibold text-center">تسجيل مسؤول رئيسي</h2>
            <form method="POST" action="{{ route('register.admin.store') }}">
                @csrf
                @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                <input type="hidden" name="role" value="admin">
                <div class="flex justify-center">
                    <button type="submit" class="px-4 py-2 text-white transition-colors duration-300 bg-blue-500 rounded-md hover:bg-blue-600">تسجيل مسؤول رئيسي</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
