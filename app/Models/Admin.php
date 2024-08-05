<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
        // تأكد من وجود خاصية `role` في النموذج
        public function isAdmin()
        {
            return $this->role === 'admin'; // تأكد من استخدام اسم الدور الصحيح
        }
}
