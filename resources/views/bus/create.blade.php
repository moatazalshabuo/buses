@extends('home')
@section('content')
    <div>
        <section class="max-w-4xl p-4 mx-auto bg-white rounded-md shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 capitalize">إضافة حافلة جديد</h2>

            <form method="POST" action="{{ route('buses.store') }}">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-4">
                    <div>
                        <label class="text-gray-700" for="name_bus">اسم الحافلة</label>
                        <input name="name_bus" id="name_bus" type="text" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('name_bus')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="departure">رقم اللوحة</label>
                        <input name="plate_number" id="plate_number" type="text" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('plate_number')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="departure">المقاعد المتاحة</label>
                        <input name="seats" id="departure" type="number" class="block w-full px-1 py-0 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @error('seats')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="bg-indigo-500 px-4 py-2 mt-4 font-semibold text-white">إنشاء حافلة</button>
            </form>
{{--
            <form method="POST" action="{{ route('buses.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="plate_number">Plate Number</label>
                    <input name="plate_number" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input name="color" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="seats">Seats</label>
                    <input name="seats" type="number" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create Bus</button>
            </form> --}}
        </section>
    </div>
@endsection
