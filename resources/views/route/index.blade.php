
@extends('home')
@section('content')
<a href="{{ route('route.create') }}">
    <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
        إضافة خط سير
    </button>

</a>
<a href="{{ route('routes.report') }}">
    <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
         تقرير
    </button>

</a>

<div class="mt-2">
    <form action="{{ route('route.search') }}" method="GET">
        <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Search..." name="search" value="{{ request('search') }}" />
        <button type="submit" class="bg-blue-950 text-white px-4 py-2 rounded-md mt-1">بحث</button>
    </form>



                <table class=" table-auto ">
                    <thead>
                        <tr >
                            <th class="px-4 py-2">رقم خط السير</th>
                            <th class="px-4 py-2">اسم خط السير</th>
                            <th class="px-4 py-2">محطة الانطلاق</th>
                            <th class="px-4 py-2">محطة الوجهة</th>
                            {{-- <th class="px-4 py-2">يوم موعد خط السير </th> --}}
                            <th class="px-4 py-2">موعد خط السير</th>
                            <th class="px-4 py-2">الحافلة</th>
                            <th class="px-4 py-2">رقم لوحة الحافلة</th>
                            <th class="px-4 py-2">المقاعد المتاحة للحافلة</th>
                            <th class="px-4 py-2">حالة خط السير</th>
                            {{-- <th class="px-4 py-2">وصف خط السير</th> --}}
                            <th class="px-4 py-2"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routes as $route)
                        <tr>
                            <td class="border px-4 py-2">{{$route->id}}</td>
                            <td class="border px-4 py-2">{{$route->name}}</td>
                            <td class="border px-4 py-2">{{ $route->departure}} </td>

                            <td class="border px-4 py-2">{{$route->destination}}</td>
                            {{-- <td class="border px-4 py-2">
                                @foreach ($route->routetimes as $routetime)
                                    {{ $routetime->day }}<br>
                                @endforeach
                            </td> --}}
                            <td class="border px-4 py-2">
                                @foreach ($route->routetimes as $routetime)
                                    {{ $routetime->departure_time }}<br>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">
                                @foreach ($route->buses as $bus)
                                    {{ $bus->name_bus }}<br>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">
                                @foreach ($route->buses as $bus)
                                    {{ $bus->plate_number }}<br>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">
                                @foreach ($route->buses as $bus)
                                    {{ $bus->seats }}<br>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('toggle.status', $route->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="toggle-button {{ $route->status ? 'bg-red-500' : 'bg-green-500' }} text-white font-bold py-2 px-4 rounded">
                                        {{ $route->status ? 'تعطيل' : 'تفعيل' }}
                                    </button>
                                </form>
                            </td>
                            {{-- <td class="border px-4 py-2">{{$route->description}}</td> --}}

                            <td class="border px-4 py-2">
                                <form action="{{ route('route.destroy', $route->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center bg-red-600 text-white px-3 py-2 rounded">
                                        <i class="fas fa-trash mr-1"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('route.edit', $route->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i>  </a>

    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection
