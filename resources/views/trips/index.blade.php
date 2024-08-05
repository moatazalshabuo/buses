@extends('home')
@section('content')
<a href="{{ route('trips.create') }}">
    <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
        إضافة رحلة
    </button>
</a>

<div class="mt-2">
    <form action="{{ route('trips.search') }}" method="GET">
        <input type="text"  class="w-full px-3 py-2 border rounded-md" name="destination" placeholder="ابحث عن اسم الرحلة" value="{{ $destination ?? '' }}" />
        <button type="submit" class="bg-blue-950 text-white px-4 py-2 rounded-md mt-1">بحث</button>
    </form>



                <table class=" table-auto ">
                    <thead>
                        <tr >
                            <th class="px-4 py-2">رقم الرحلة </th>
                            <th class="px-4 py-2">اسم الرحلة </th>
                            <th class="px-4 py-2">تاريخ الرحلة </th>
                            <th class="px-4 py-2">مقاعد الرحلة </th>
                            <th class="px-4 py-2">حالة الرحلة </th>

                            <th class="px-4 py-2"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trips as $trip)
                        <tr>
                            <td class="border px-4 py-2">{{$trip->id}}</td>
                            <td class="border px-4 py-2">{{$trip->destination}}</td>
                            <td class="border px-4 py-2">{{ $trip->date}} </td>
                            <td class="border px-4 py-2">{{$trip->available_seats}}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('trips.update-status', $trip->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn @if($trip->custom_status) btn-danger @else btn-success @endif">
                                        @if($trip->custom_status)
                                            غير متاحة
                                        @else
                                            متاحة
                                        @endif
                                    </button>
                                </form>
                            </td>



                            <td class="border px-4 py-2">
                                <a href="{{ route('trips.edit', $trip->id) }}"><button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">تعديل</button></a>
    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection
