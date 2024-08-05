<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buses';

    protected $fillable = [
        'name_bus',
        'plate_number',
        'seats',
        'status',
    ];
    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'bus_id');
    }
}
