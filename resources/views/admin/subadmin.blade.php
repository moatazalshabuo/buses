@extends('home')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">المسؤولون الفرعيون</h1>

        <div class="flex mb-4">
            <a href="{{ route('admin.register') }}" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
                إضافة مسؤول جديد
            </a>
        </div>

        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-gray-700">الاسم</th>
                    <th class="px-4 py-2 text-gray-700">البريد الإلكتروني</th>
                    <th class="px-4 py-2 text-gray-700">الإجراء</th>
                    <th class="px-4 py-2 text-gray-700">الاجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subAdmins as $subAdmin)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $subAdmin->name }}</td>
                    <td class="border px-4 py-2">{{ $subAdmin->email }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.edit', $subAdmin->id) }}" class="inline-block p-2 text-blue-700 bg-blue-200 rounded hover:bg-blue-300">
                            <i class="fas fa-edit"></i> <!-- تأكد من تضمين Font Awesome -->
                        </a>
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.destroy', $subAdmin->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المسؤول؟');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-700 bg-red-200 rounded hover:bg-red-300">
                                <i class="fas fa-trash"></i> <!-- تأكد من تضمين Font Awesome -->
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
