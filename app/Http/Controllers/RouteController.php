<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\RouteTime;
use App\Models\Bus;

use Barryvdh\DomPDF\Facade\PDF;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function generateReport()
    {
        $routes = Route::with(['routetimes', 'buses'])->get();
        $pdf = PDF::loadView('route.reports', compact('routes'))->setPaper('a4', 'landscape');
        return $pdf->download('routes_report.pdf');
    }

    public function index()
{
    $routes = Route::with('routetimes')->get();

    return view('route.index', compact('routes'));
}

// add route
public function create()
{
    $routeTimes = RouteTime::distinct()->get(['departure_time']);
    $buses = Bus::distinct()->get(['id', 'name_bus']);
    return view('route.create', compact('routeTimes','buses'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'departure' => 'required|string',
        'destination' => 'required|string',
        'departure_time' => 'required',
        'name_bus' => 'required',
    ]);

    $route = new Route([
        'name' => $validatedData['name'],
        'departure' => $validatedData['departure'],
        'destination' => $validatedData['destination'],
    ]);

    $route->save();

    // route time

    $departureTime = $validatedData['departure_time'];

    $routeTime = new RouteTime([

        'departure_time' => $departureTime,
    ]);

    $route->routetimes()->save($routeTime);

   // bus

$name_bus = $validatedData['name_bus'];

$bus = Bus::findOrFail($name_bus);

// Access the desired bus properties
$busName = $bus->name_bus;
$plateNumber = $bus->plate_number; // استخدم حقل 'plate_number' بدلاً من 'name_bus'
$seats = $bus->seats; // استخدم حقل 'seats'

// Create the bus record associated with the route
$bus = new Bus([
    'name_bus' => $busName,
    'plate_number' => $plateNumber,
    'seats' => $seats,
    // ...
]);

$route->buses()->save($bus);
    return redirect()->route('route.index')->with(['success' => 'تم إنشاء الرحلة بنجاح.']);
}
    //route edit
    public function edit(Route $route)
{
    return view('route.edit', compact('route'));
}
public function update(Request $request, Route $route)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'departure' => 'required|string|max:255',
    ]);

    $route->update($validatedData);

    return redirect()->route('route.index')->with('success', 'تم تحديث المسار بنجاح');
}
//delete Route
public function destroy($id)
{
    // حذف السجلات المرتبطة في جدول routetime
    RouteTime::where('route_id', $id)->delete();

    // حذف الخط السير من جدول routes
    $route = Route::findOrFail($id);
    $route->delete();

    // ربما تقوم بالتوجيه إلى صفحة أخرى بعد الحذف


    return redirect()->route('route.index')->with('success', 'تم حذف خط السير بنجاح.');
}

// تغيير حالة الخط

public function toggleStatus($id)
{
    $route = Route::find($id);

    if ($route) {
        $route->status = !$route->status;
        $route->save();

        // راجع الاستجابة المناسبة مثل تحديث الصفحة أو رسالة نجاح
        return redirect()->back()->with('success', 'تم تبديل الحالة بنجاح.');
    }

    // راجع الاستجابة المناسبة في حالة عدم العثور على العنصر
    return redirect()->back()->with('error', 'لم يتم العثور على العنصر.');
}
    //search route

    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $routes = Route::where('name', 'like', "%$searchTerm%")
                    ->orWhere('destination', 'like', "%$searchTerm%")
                    ->get();

    // قم بتمرير المتغير $routes إلى عرض النتائج في العرض الخاص بك
    return view('route.index', ['routes' => $routes]);
}
}
