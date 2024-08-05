<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return view('trips.index', compact('trips'));
    }

    public function create()
{
    return view('trips.create');
}

public function store(Request $request)
{
    $tripData = $request->validate([
       'destination' => 'required',
        'date' => 'required',
        'available_seats' => 'required|numeric',

    ]);

    $trip = Trip::create($tripData);

    return redirect()->route('trips.index')->with(['success' => 'تم إنشاء الرحلة بنجاح']);
}
public function edit(Trip $trip)
    {
        return view('trips.edit', ['trip' => $trip]);
    }

    public function update(Request $request, Trip $trip)
    {
        $validatedData = $request->validate([
            'destination' => 'required|string|max:255',
            'available_seats' => 'required|integer|max:255',
            'date' => 'required|date',
        ]);

        $trip->update($validatedData);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully');
    }
//trips search
    public function search(Request $request)
    {
        $destination = $request->input('destination');

        $trips = Trip::where('destination', 'like', '%' . $destination . '%')->get();

        return view('trips.index', compact('trips', 'destination'));
    }


    public function updateStatus(Request $request, $id)
{
    $trip = Trip::findOrFail($id);
    $trip->custom_status = !$trip->custom_status; // تغيير قيمة الحالة بين صحيح وكاذب
    $trip->save();

    return redirect()->back()->with('status', 'تم تحديث حالة الرحلة بنجاح.');
}
}
