<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bus;
use App\Models\Route;
use App\Models\RouteTime;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create()
    {
        $routes = Route::all();
        // نحتاج فقط للأوقات والحافلات المرتبطة بالطريق المحدد
        return view('reservation.create', compact('routes'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'route_time_id' => 'required|exists:routetime,id',
            'bus_id' => 'required|exists:buses,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $bus = Bus::find($validatedData['bus_id']);

        // تحقق من وجود مقعد متاح
        if ($bus->seats >= 1) {
            // تنفيذ عملية الحجز وتحديث عدد المقاعد
            $bus->seats -= 1; // حجز مقعد واحد
            $bus->save();

            $reservation = new Reservation();
            $reservation->route_id = $validatedData['route_id'];
            $reservation->route_time_id = $validatedData['route_time_id'];
            $reservation->bus_id = $validatedData['bus_id'];
            $reservation->user_id = $validatedData['user_id'];

            $reservation->save();

            return redirect()->route('reservations.index')->with('success', 'تم حفظ الحجز بنجاح!');
        } else {
            return redirect()->route('reservations.create')->with('error', 'عذرًا، لا توجد مقاعد متاحة.');
        }

}

    public function getTimes($routeId)
    {
        $times = RouteTime::where('route_id', $routeId)->get();
        return response()->json($times);
    }

    public function getBusesByRoute($routeId)
    {
        $buses = Bus::where('route_id', $routeId)->get();
        return response()->json($buses);
    }

    //عرض حجوزات مستخدم مسجل
    public function myReservations()
    {
        $userId = auth()->id(); // الحصول على معرف المستخدم المسجل
        $reservations = Reservation::where('user_id', $userId)->get(); // استرجاع الحجوزات الخاصة بالمستخدم

        return view('reservation.index', compact('reservations'));
    }

    // إلغاء حجز قبل موعد انطلاق خط السير

    public function cancelReservation($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect()->route('reservations.index')->with('error', 'حجز غير موجود.');
        }

        if ($reservation->user_id !== auth()->id()) {
            return redirect()->route('reservations.index')->with('error', 'لا يمكنك إلغاء هذا الحجز.');
        }

        $routeTime = RouteTime::find($reservation->route_time_id);
        if (!$routeTime) {
            return redirect()->route('reservations.index')->with('error', 'موعد الرحلة غير موجود.');
        }

        // الحصول على الوقت الحالي في المنطقة الزمنية المحددة
        $currentTime = Carbon::now('Africa/Tripoli'); // وقت الخادم حسب المنطقة الزمنية
        // تحويل وقت الانطلاق إلى نفس المنطقة الزمنية
        $departureTime = Carbon::parse($routeTime->departure_time, 'Africa/Tripoli');

        // تسجيل المعلومات في السجل
        Log::info("Current time: $currentTime, Departure time: $departureTime");

        if ($currentTime->lessThan($departureTime)) {
            $bus = Bus::find($reservation->bus_id);
            $bus->seats += 1;
            $bus->save();

            $reservation->delete();
            Log::info("Reservation ID $id has been deleted.");
            return response()->json(['success' => 'تم إلغاء الحجز بنجاح.']);
        } else {
            return response()->json(['error' => 'لا يمكنك إلغاء الحجز بعد موعد انطلاق الخط السير.'], 400);
        }
    }
}
