@extends('user.home')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-center mb-4">
            <form method="GET" action="{{ route('search') }}">
                <input type="text" name="search" class="px-15 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent" placeholder=" ابحث عن خط السير من خلال محطة الانطلاق أو الوصول" style="width: 400px;"> <!-- تم تعديل خاصية style="width: 400px;" -->
                <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">ابحث</button>
            </form>
        </div>

    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                {{-- <th scope="col" class="px-6 py-3">
                    رقم خط السيير
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    أسم خط السيير
                </th>
                <th scope="col" class="px-6 py-3">
                    محطة الانطلاق
                </th>
                <th scope="col" class="px-6 py-3">
                    محطة الوصول
                </th>
                <th scope="col" class="px-6 py-3">
                           توقيت الانطلاق
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    <span class="sr-only">يوم موعد خط السير</span>
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only"> موعد خط السير</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($routes as $route)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $route->id }}
                    </th> --}}
                    <td class="px-6 py-4">
                        {{ $route->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $route->departure }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $route->destination }}
                    </td>
                    {{-- <td class="px-6 py-4 text-right">
                        @foreach ($route->routetimes as $routetime)
                            {{ $routetime->day }}<br>
                        @endforeach
                    </td> --}}
                    <td class="px-6 py-4 text-right">
                        @foreach ($route->routetimes as $routetime)
                            {{ $routetime->departure_time }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
