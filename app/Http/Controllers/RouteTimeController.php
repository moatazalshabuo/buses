<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RouteTime;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteTimeController extends Controller
{
    public function index()
    {
        $routeTimes = RouteTime::all();
        return view('routetime.index', compact('routeTimes'));
    }
    public function create()
    {
        $routes = Route::all();
        return view('routetime.create', compact('routes'));

    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'departure_time' => 'required',
            // 'day' => 'required',
            // 'route_id' => 'required|exists:routes,id',
        ]);

        $routeTime = new RouteTime();
        $routeTime->departure_time = $validatedData['departure_time'];
        // $routeTime->day = $validatedData['day'];
        // $routeTime->route_id = $validatedData['route_id'];
        $routeTime->save();

        return redirect()->route('routetime.index')->with('success', 'تمت إضافة التوقيت بنجاح.');
    }
// route time Edit
public function edit(RouteTime $routeTime)
{
    return view('routetime.edit', compact('routeTime'));
}

public function update(Request $request, RouteTime $routeTime)
{
    // dd('Reached the update function');
    $validatedData = $request->validate([
        'departure_time' => 'required',
    ]);

    $routeTime->update($validatedData);

    return redirect()->route('routetime.index')->with('success', 'تم تحديث مواعيد الطريق بنجاح');
}
//delete Route Time
public function destroy($id)
{
    $routeTime = RouteTime::findOrFail($id);
    $routeTime->delete();

    // قم بتوجيه المستخدم إلى الصفحة المناسبة بعد الحذف
    return redirect()->route('routetime.index')->with('success', 'تم حذف موعد خط السير بنجاح');
}

//Route time active un active
    public function toggleStatus($id)
    {
        $routeTime = RouteTime::find($id);

        if ($routeTime) {
            $routeTime->status = !$routeTime->status;
            $routeTime->save();

            // راجع الاستجابة المناسبة مثل تحديث الصفحة أو رسالة نجاح
            return redirect()->back()->with('success', 'تم تبديل الحالة بنجاح.');
        }

        // راجع الاستجابة المناسبة في حالة عدم العثور على العنصر
        return redirect()->back()->with('error', 'لم يتم العثور على العنصر.');
    }

}
