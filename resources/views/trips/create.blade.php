@extends('home')
@section('content')
        <div >

            <section class="max-w-4xl p-4 mx-auto bg-white rounded-md shadow-md">
                <h2 class="text-lg font-semibold text-gray-700 capitalize">إضافة رحلة جديد</h2>

                <form method="POST" action="{{ route('trips.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-4">
                        <div>
                            <label class=" text-gray-700" for="name">أسم الرحلة</label>
                            <input  name="destination" id="name" type="text" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                            @error('destination')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                            </div>


                        <div>
                            <label class="text-gray-700" for="date">تاريخ الرحلة</label>
                            <input  name="date" id="date" type="date"  class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                            @error('date')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-700" for="seats">مقاعد الرحلة</label>
                            <input name="available_seats" id="seats" type="number" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                            @error('available_seats')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 px-4 py-2 mt-4 font-semibold text-white ">إنشاء الرحلة</button>
                </form>
            </section>
@endsection
