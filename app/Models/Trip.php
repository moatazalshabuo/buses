<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $table = 'trips';

    protected $fillable = [
        'destination',
        'date',
        'available_seats' ,
        'custom_status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
