
@extends('home')
@section('content')

<a href="{{ route('routetime.create') }}">
    <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
        إضافة موعد خط سير
    </button>
</a>

<div class="mt-2">
    {{-- <form action="{{ route('routes.search') }}" method="GET">
        <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Search..." name="search" value="{{ request('search') }}" />
        <button type="submit" class="bg-blue-950 text-white px-4 py-2 rounded-md mt-1">بحث</button>
    </form> --}}



                <table class=" table-auto ">
                    <thead>
                        <tr >
                            <th class="px-4 py-2">رقم موعد خط السير</th>

                            <th class="px-4 py-2">موعد خط السير</th>
                            <th class="px-4 py-2">حالة موعد خط السير</th>

                            <th class="px-4 py-2"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routeTimes as $routeTime)
                        <tr>
                            <td class="border px-4 py-2">{{$routeTime->id}}</td>

                            <td class="border px-4 py-2">{{$routeTime->departure_time}}</td>


                            <td class="border px-4 py-2">
                                <form action="{{ route('toggle.status', $routeTime->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="toggle-button {{ $routeTime->status ? 'bg-red-500' : 'bg-green-500' }} text-white font-bold py-2 px-4 rounded">
                                        {{ $routeTime->status ? 'تعطيل' : 'تفعيل' }}
                                    </button>
                                </form>
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('routetime.destroy', $routeTime->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center bg-red-600 text-white px-3 py-2 rounded">
                                        <i class="fas fa-trash mr-1"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="border px-4 py-2">
                                <a href=" {{ route('routetime.edit', $routeTime->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

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
