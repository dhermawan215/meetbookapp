<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';

    protected $fillable = [
        'nama_ruang',
        'kapasitas',
        'fasilitas',
        'lokasi'
    ];

    public function roomBooks()
    {
        return $this->hasMany(Booked::class, 'room_id', 'id');
    }
}
