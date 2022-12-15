<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booked extends Model
{
    use HasFactory;

    protected $table = 'booked';

    protected $fillable = [
        'book_no',
        'activity',
        'topic',
        'room_id',
        'user_id',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'participants',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
