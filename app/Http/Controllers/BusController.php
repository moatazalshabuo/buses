<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();

        return view('bus.index', compact('buses'));
    }
    public function create()
    {
        return view('bus.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_bus' => 'required|string',
            'plate_number' => 'required|string',
            // 'color' => 'required|string',
            'seats' => 'required|integer',
        ]);

        $bus = Bus::create($validatedData);

        return redirect()->route('buses.index')->with('success', 'تم إضافة الحافلة بنجاح');
    }
    public function edit(Bus $bus)
    {
        return view('bus.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $data = $request->validate([
            'name_bus' => 'required|string',
            'plate_number' => 'required|string',
            // 'color' => 'required|string',
            'seats' => 'required|integer',
        ]);

        $bus->update($data);

        return redirect()->route('buses.index')->with('success', 'تم تحديث بيانات الحافلة بنجاح.');
    }
// Delete Bus
public function destroy($id)
{
    $bus = Bus::findOrFail($id);
    $bus->delete();

    // قم بتوجيه المستخدم إلى الصفحة المناسبة بعد الحذف
    return redirect()->route('bus.index')->with('success', 'تم حذف الحافلة بنجاح');
}
    public function toggleStatus($id)
{
    $bus = Bus::find($id);

    if ($bus) {
        $bus->status = !$bus->status;
        $bus->save();

        // راجع الاستجابة المناسبة مثل تحديث الصفحة أو رسالة نجاح
        return redirect()->back()->with('success', 'تم تبديل الحالة بنجاح.');
    }

    // راجع الاستجابة المناسبة في حالة عدم العثور على العنصر
    return redirect()->back()->with('error', 'لم يتم العثور على العنصر.');
}

//Search Bus

public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $buses = Bus::where('name', 'like', "%$searchTerm%")
                ->get();

    // قم بتمرير المتغير $buses إلى عرض النتائج في العرض الخاص بك
    return view('bus.index', ['buses' => $buses]);
}

public function login(Request $request){
    
    return view('buses.login');
}
public function handale_login(Request $request){
        $request->validate([
            'plate'=>'required|string|exists:buses,plate_number'
        ]);
        $bus = Bus::Where('plate_number',$request->plate)->get()->first();
        $request->session()->put('bus_id',$bus->id);
        return redirect('routes-bus');
}
public function routeBus(Request $request){
    
    $reservations = Reservation::where('bus_id',$request->session()->get('bus_id'))->get();
    return view('buses.routes',compact('reservations'));
}
public function map(Request $request,$id){
    $reservation = Reservation::find($id);
    return view('buses.map',compact('reservation'));
}

}
