@extends('home')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form action="{{route('routes.update', $route->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex flex-col">
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="name">اسم خط السير</label>
                                <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                       id="name" name="destination" type="text" placeholder=" Name" value="{{$route->name}}">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="name">محطة الانطلاق</label>
                                <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                       id="name" name="destination" type="text" placeholder="Warehouse Name" value="{{$route->departure}}">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="address">محطة الوصول</label>
                                <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                       id="address" name="date" type="text" placeholder="Warehouse Address" value="{{$route->destination}}">
                            </div>

                            <div class="mb-4">
                                <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="submit">
                                    تعديل
                                </button>
                            </div>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    </form>



                </div>

            </div>

        </div>
    </div>
    @endsection
