<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserLogin extends Authenticatable
{
    use HasFactory;

    use Notifiable;
    protected $primaryKey = 'user_login_id';

    protected $fillable = [
         'email', 'password',
    ];
}
