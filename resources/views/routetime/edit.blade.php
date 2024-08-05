@extends('home')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('routetime.update', $routeTime->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="font-bold text-gray-800" for="departure_time">وقت المغادرة</label>
                            <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                   id="departure_time" name="departure_time" type="text" placeholder="وقت المغادرة" value="{{ $routeTime->departure_time }}">
                        </div>

                        <div class="mb-4">
                            <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="submit">
                                تعديل
                            </button>
                        </div>
                    </div>
                </form>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
