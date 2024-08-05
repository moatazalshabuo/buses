
@extends('home')
@section('content')

<a href="{{ route('buses.create') }}">
    <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
        إضافة حافلة
    </button>
</a>

<div class="mt-2">
    <form action="{{ route('buses.search') }}" method="GET">
        <input type="text"  placeholder=" ابحث بإستخدام اسم الحافلة"  class="w-full px-3 py-2 border rounded-md" placeholder="Search..." name="search" value="{{ request('search') }}" />
        <button type="submit"class="bg-blue-950 text-white px-4 py-2 rounded-md mt-1">بحث</button>
    </form>



                <table class=" table-auto ">
                    <thead>
                        <tr >
                            <th class="px-4 py-2">رقم  الحافلة</th>
                            <th class="px-4 py-2"> اسم الحافلة </th>
                            <th class="px-4 py-2">رقم اللوحة  </th>
                            <th class="px-4 py-2">المقاعد المتاحة </th>

                            <th class="px-4 py-2"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buses as $bus)
                        <tr>
                            <td class="border px-4 py-2">{{ $bus->id}}</td>
                            <td class="border px-4 py-2">{{ $bus->name_bus}}</td>
                            <td class="border px-4 py-2">{{ $bus->plate_number}}</td>
                            <td class="border px-4 py-2">{{ $bus->seats}}</td>

{{-- تغيير حالة حافلة --}}
                            <td class="border px-4 py-2">
                                <form action="{{ route('toggle.status', $bus->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="toggle-button {{ $bus->status ? 'bg-red-500' : 'bg-green-500' }} text-white font-bold py-2 px-4 rounded">
                                        {{ $bus->status ? 'غير متاحة' : 'متاحة' }}
                                    </button>
                                </form>
                            </td>



                            <td class="border px-4 py-2">

                                <a href=" {{ route('buses.edit', $bus->id) }}
                                    " class="btn btn-primary"><i class="fas fa-edit"></i>  </a>
                             </td>
                             <td class="border px-4 py-2">
                                <form action="{{ route('buses.destroy', $bus->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف الحافلة؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center bg-red-600 text-white px-3 py-2 rounded">
                                        <i class="fas fa-trash mr-1"></i>

                                      </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    </div>
@endsection
