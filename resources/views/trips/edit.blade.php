@extends('home')
@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

</head>
<body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        <form action="{{route('trips.update', $trip->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="flex flex-col">
                                <div class="mb-4">
                                    <label class="font-bold text-gray-800" for="name">اسم الرحلة</label>
                                    <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                           id="name" name="destination" type="text" placeholder="Warehouse Name" value="{{$trip->destination}}">
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-gray-800" for="address">date</label>
                                    <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                           id="address" name="date" type="date" placeholder="Warehouse Address" value="{{$trip->date}}">
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-gray-800" for="address">مقاعد الرحلة</label>
                                    <input
                                        class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                        id="phone" name="available_seats" type="number" placeholder="Warehouse phone" value="{{$trip->available_seats}}">
                                </div>
                                <div class="mb-4">
                                    <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="submit">
                                        تعديل الرحلة
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>

                </div>

            </div>
        </div>

@endsection
