@extends('home')
@section('content')
    <div>
        <section class="max-w-4xl p-4 mx-auto bg-white rounded-md shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 capitalize">إضافة خط سير جديد</h2>

            <form method="POST" action="{{ route('route.store') }}">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-4">
                    <div>
                        <label class="text-gray-700" for="name">اسم خط السير</label>
                        <input name="name" id="name" type="text" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="departure">محطة المغادرة</label>
                        <input name="departure" id="departure" type="text" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('departure')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="destination">محطة الوصول</label>
                        <input name="destination" id="destination" type="text" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('destination')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="form-group">
                        <label for="departure_time">وقت خط السير</label>
                        <select name="departure_time" class="form-control">
                            @foreach($routeTimes as $routeTime)
                                <option value="{{ $routeTime->departure_time }}">{{ $routeTime->departure_time }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name_bus">اسم الحافلة:</label>
                        <select class="form-control" id="name_bus" name="name_bus">
                            @foreach($buses as $bus)
                                <option value="{{ $bus->id }}">{{ $bus->name_bus }}</option>
                            @endforeach
                        </select>
                    </div>
                <button type="submit" class="bg-indigo-500 px-4 py-2 mt-4 font-semibold text-white">إنشاء خط سير</button>
            </form>
        </section>
    </div>
@endsection
