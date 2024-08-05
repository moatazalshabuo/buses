@extends('home')
@section('content')
    <div>
        <section class="max-w-4xl p-4 mx-auto bg-white rounded-md shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 capitalize">إضافة رحلة جديدة</h2>

            <form method="POST" action="{{ route('routetime.store') }}">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-4">
                    {{-- <div>
                        <label class="text-gray-700" for="route_id">اسم خط السير</label>
                        <select name="route_id" id="route_id" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                            @foreach ($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                            @endforeach
                        </select>
                        @error('route_id')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div> --}}



                    <div>
                        <label class="text-gray-700" for="departure_time">موعد خط السير</label>
                        <input name="departure_time" id="departure_time" type="time" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('departure_time')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 px-4 py-2 mt-4 font-semibold text-white">إنشاء الموعد  </button>
                </div>
            </form>
        </section>
    </div>
@endsection
