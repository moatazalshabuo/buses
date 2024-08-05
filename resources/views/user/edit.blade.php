@extends('home')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">تعديل بيانات المستخدم</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block">اسم المستخدم</label>
            <input type="text" name="name" value="{{ $user->name }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block">البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ $user->email }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block">كلمة المرور الجديدة (اترك فارغًا إذا لم تكن ترغب في تغييرها)</label>
            <input type="password" name="password" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label for="address" class="block">العنوان</label>
            <input type="text" name="address" value="{{ $user->address }}" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label for="college" class="block">الكلية</label>
            <input type="text" name="college" value="{{ $user->college }}" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label for="phone" class="block">رقم الهاتف</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label for="type" class="block">النوع</label>
            <input type="text" name="type" value="{{ $user->type }}" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label for="blood_type" class="block">فصيلة الدم</label>
            <input type="text" name="blood_type" value="{{ $user->blood_type }}" class="border rounded w-full p-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">تحديث البيانات</button>
    </form>
</div>
@endsection
