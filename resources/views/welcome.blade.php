<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الرئيسية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif; /* تغيير الخط إلى Cairo */
            color: white;
        }

        .navbar {
            background: transparent; /* شفاف */
            position: absolute; /* لجعل الشريط فوق الصورة */
            width: 100%; /* ليملأ العرض بالكامل */
            z-index: 1; /* ليكون فوق الصورة */
        }

        .navbar .nav-link {
            color: white !important; /* لون نص الروابط إلى الأبيض */
            font-weight: bold; /* خط غامق */
        }

        .navbar .nav-link:hover {
            color: #f8f9fa !important; /* لون نص الروابط عند التحويم */
        }

        .hero {
            background-image: url('/bus1.jpg'); /* رابط الصورة */
            height: 100vh; /* ليملأ الشاشة بالكامل */
            background-size: cover; /* لتغطية الخلفية */
            background-position: center; /* لجعل الصورة متمركزة */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative; /* لتسهيل وضع العناصر فوقه */
            z-index: 0; /* تحت شريط التنقل */
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 24px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> <!-- قائمة على اليسار -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">النقل الطلابي</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">تواصل معنا</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto"> <!-- قائمة على اليمين -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">تسجيل الدخول كمشرف</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">تسجيل الدخول كمستخدم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bus-login') }}">تسجيل دخول الحافلات</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>مرحبًا بك في النقل الطلابي</h1>
        <p>نظام النقل الطلابي</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
