<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    use HasFactory;

    protected $table = 'user_attendace';

    protected $fillable = [
        'user_registered_id',
        'registered_at',
    ];

    public function userRegistered()
    {
        return $this->belongsTo(UserRegistered::class, 'user_registered_id', 'id');
    }
}
