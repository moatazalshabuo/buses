@extends('user.home')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">إنشاء حجز</h1>

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('reservation.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="seats" value="1"> <!-- حجز مقعد واحد فقط -->

        <div class="mb-4">
            <label for="route_id" class="block text-sm font-bold mb-2">اختر الطريق:</label>
            <select name="route_id" id="route_id" class="block w-full border rounded-md shadow-sm p-2">
                @foreach($routes as $route)
                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="route_time_id" class="block text-sm font-bold mb-2">اختر الموعد:</label>
            <select name="route_time_id" id="route_time_id" class="block w-full border rounded-md shadow-sm p-2">
                <!-- الخيارات سيتم تحميلها بناءً على الطريق المحدد -->
            </select>
        </div>

        <div class="mb-4">
            <label for="bus_id" class="block text-sm font-bold mb-2">اختر الحافلة:</label>
            <select name="bus_id" id="bus_id" class="block w-full border rounded-md shadow-sm p-2">
                <!-- الخيارات ستتم تحميلها بناءً على الطريق المحدد -->
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                حفظ الحجز
            </button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#route_id').change(function(){
        var routeId = $(this).val();

        $.get("{{ route('times', '') }}/" + routeId, function(data){
            $('#route_time_id').empty();
            $.each(data, function(index, time){
                $('#route_time_id').append('<option value="' + time.id + '">' + time.departure_time + ' - ' + time.arrival_time + '</option>');
            });
        }).fail(function(xhr, status, error) {
            console.error("Failed to load times. Error: " + error);
        });

        $.get("{{ route('busesByRoute', '') }}/" + routeId, function(data){
            $('#bus_id').empty();
            $.each(data, function(index, bus){
                $('#bus_id').append('<option value="' + bus.id + '">' + bus.name_bus + '</option>');
            });
        }).fail(function(xhr, status, error) {
            console.error("Failed to load buses. Error: " + error);
        });
    });

    // Trigger change event on route select to load initial data
    $('#route_id').trigger('change');
});
</script>
@endsection
