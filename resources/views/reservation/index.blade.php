@extends('user.home')

@section('content')
<div class="container py-8 mx-auto">
    <h1 class="mb-4 text-2xl font-bold">حجوزاتي</h1>

    @if($reservations->isEmpty())
        <p class="text-gray-600">لا توجد حجوزات لديك.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="text-gray-600 bg-gray-100">
                        <th class="px-4 py-2 border-b">رقم الحجز</th>
                        <th class="px-4 py-2 border-b">اسم الطريق</th>
                        <th class="px-4 py-2 border-b">محطة الانطلاق</th>
                        <th class="px-4 py-2 border-b">محطة الوصول</th>
                        <th class="px-4 py-2 border-b">موعد المغادرة</th>
                        <th class="px-4 py-2 border-b">إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr class="text-gray-700">
                            <td class="px-4 py-2 border-b">{{ $reservation->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $reservation->route->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $reservation->route->departure }}</td>
                            <td class="px-4 py-2 border-b">{{ $reservation->route->destination }}</td>
                            <td class="px-4 py-2 border-b">{{ $reservation->routetime->departure_time }}</td>
                            <td class="px-4 py-2 border-b">
                                <button class="flex items-center px-3 py-2 text-white bg-red-600 rounded cancelReservationBtn" data-reservation-id="{{ $reservation->id }}">إلغاء الحجز</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.cancelReservationBtn').click(function(){
        var reservationId = $(this).data('reservation-id');

        $.ajax({
            url: "{{ route('reservation.cancel', ['id' => ':id']) }}".replace(':id', reservationId),
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.success) {
                    alert(data.success);
                    location.reload(); // إعادة تحميل الصفحة لتحديث قائمة الحجوزات
                } else {
                    alert(data.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("Failed to cancel reservation. Error: " + error);
                alert('لا يمكنك إلغاء الحجز بعد موعد انطلاق الخط السير.');
            }
        });
    });
});
</script>
@endsection
