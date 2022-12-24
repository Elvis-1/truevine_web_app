<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminGenerateLink extends Model
{
    use HasFactory;

    use Notifiable;
    protected $table = 'admin_generate_link';
    public $timestamps = false;

    protected $fillable = [
         'unique_string', 'link','created_at', 'expired_at',
    ];
}
