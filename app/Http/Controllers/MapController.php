<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    function index(Request $request){
        $user = Auth::user();
        // echo Auth::check() ."555";
        // die();
        $reservation = Reservation::where('user_id',$user->id)->get()->last();
        return view('map.map',compact('reservation'));
    }
}
