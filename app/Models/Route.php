<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'departure', 'destination'];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function routeTimes()
    {
        return $this->hasMany(RouteTime::class);
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'route_id');
    }
}
