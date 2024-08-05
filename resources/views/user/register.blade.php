<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 mx-4 bg-white rounded-md shadow-md">
            <h2 class="text-3xl font-semibold text-center">تسجيل مستخدم جديد</h2>
            <form action="/user/register" method="POST" class="mt-8">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-2 font-bold text-gray-700">الاسم:</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 font-bold text-gray-700">البريد الإلكتروني:</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 font-bold text-gray-700">كلمة المرور:</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="proof_number" class="block mb-2 font-bold text-gray-700">رقم الهوية:</label>
                    <input type="text" id="proof_number" name="proof_number" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="type" class="block mb-2 font-bold text-gray-700">النوع:</label>
                    <input type="text" id="type" name="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="college" class="block mb-2 font-bold text-gray-700">الكلية:</label>
                    <input type="text" id="college" name="college" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 font-bold text-gray-700">رقم الهاتف:</label>
                    <input type="text" id="phone" name="phone" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="address" class="block mb-2 font-bold text-gray-700">العنوان:</label>
                    <input type="text" id="address" name="address" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="blood_type" class="```html
<div class="mb-4">
    <label for="blood_type" class="block mb-2 font-bold text-gray-700">فصيلة الدم:</label>
    <input type="text" id="blood_type" name="blood_type" required
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
</div>
<div class="mb-4">
    <div class="flex items-center justify-center mt-6">
        <button type="submit"
            class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">تسجيل</button>
    </div>
</div>
</form>
</div>
</div>
</body>

</html>
