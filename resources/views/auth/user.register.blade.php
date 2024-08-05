<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
    <style>
        /* أضف أنماط CSS الخاصة بك هنا */
    </style>
</head>
<body>
    <h2>تسجيل مستخدم جديد</h2>
    <form method="POST" action="{{ route('user.register') }}">
        @csrf
        <label for="name">الاسم:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">كلمة المرور:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">تسجيل</button>
    </form>
</body>
</html>
