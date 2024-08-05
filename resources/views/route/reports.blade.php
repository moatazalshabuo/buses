<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير الخطوط</title>
    <style>
        @font-face {
            font-family: 'Amiri';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/Amiri-Regular.ttf') }}') format('truetype');
        }
        body {
            font-family: 'Amiri', sans-serif;
            direction: rtl;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>تقرير الخطوط</h1>
    <table>
        <thead>
            <tr>
                <th>التوقيت</th>
                <th>الحافلات</th>
                <th>اسم الخط</th>
            </tr>
        </thead>
        <tbody>
            @if($routes->isEmpty())
                <tr><td colspan="3">لا توجد بيانات متاحة</td></tr>
            @else
                @foreach($routes as $route)
                    <tr>
                        <td>{{ $route->routetimes->pluck('departure_time')->implode(', ') }}</td>
                        <td>{{ $route->buses->pluck('name_bus')->implode(', ') }}</td>
                        <td>{{ $route->name }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
