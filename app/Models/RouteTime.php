<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTime extends Model
{
    use HasFactory;
    protected $table = 'routetime';

    protected $fillable = [
        'departure_time',


    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'route_time_id');
    }
}
