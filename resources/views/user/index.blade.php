@extends('home')

@section('content')
{{-- <div class="container mx-auto p-6"> --}}
    <h1 class="text-2xl font-bold mb-4">قائمة المستخدمين</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded shadow-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- <div class="overflow-x-auto"> --}}
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border-b">اسم المستخدم</th>
                    <th class="py-2 px-4 border-b">البريد الإلكتروني</th>
                    <th class="py-2 px-4 border-b">العنوان</th>
                    <th class="py-2 px-4 border-b">الكلية</th>
                    <th class="py-2 px-4 border-b">رقم الهاتف</th>
                    <th class="py-2 px-4 border-b">النوع</th>
                    <th class="py-2 px-4 border-b">فصيلة الدم</th>
                    <th class="py-2 px-4 border-b">الإجراءات</th>
                    <th class="py-2 px-4 border-b">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->address }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->college }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->phone }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->type }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->blood_type }}</td>

                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('admin.users.toggle.status', $user->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-block px-2 py-1 text-xs font-semibold {{ $user->status ? 'text-red-700 bg-red-200' : 'text-green-700 bg-green-200' }} rounded">
                                    {{ $user->status ? 'إلغاء تفعيل' : 'تفعيل' }}
                                </button>
                            </form>

                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-block px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-200 rounded">
                            تعديل
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
