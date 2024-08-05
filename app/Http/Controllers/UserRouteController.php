<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class UserRouteController extends Controller
{
    public function index()
    {
        $routes = Route::with('routetimes')->get();
        return view('route.userindex', compact('routes'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $routes = Route::where('departure', 'like', "%$searchTerm%")
                        ->orWhere('destination', 'like', "%$searchTerm%")
                        ->get();

        // قم بتمرير المتغير $routes إلى عرض النتائج في العرض الخاص بك
        return view('route.userindex', ['routes' => $routes]);
    }
}
