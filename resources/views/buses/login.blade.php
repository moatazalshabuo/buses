<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول للحافلات</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .container {
            max-width: 400px;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mb-4 text-center">تسجيل الدخول الحافلات</h3>

        <form method="POST" action="{{ route('handale.login') }}">
            @csrf

            <div class="form-group">
                <label for="email">رقم اللوحة</label>
                <input id="plate" type="number" class="form-control" name="plate" value="{{ old('plate') }}" required autofocus>
                @error('plate')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">تذكرني</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
        </form>

        <div class="mt-3 text-center">
            {{-- <p>ليس لديك حساب؟ <a href="{{ route('registeradmin') }}">إنشاء حساب</a></p> --}}
        </div>
    </div>
</body>
</html>
