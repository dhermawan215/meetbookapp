<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegistered extends Model
{
    use HasFactory;

    protected $table = 'user_registered';

    protected $fillable = [
        'name'
    ];

    public function userAttendance()
    {
        return $this->hasOne(UserAttendance::class, 'user_registered_id', 'id');
    }
}
