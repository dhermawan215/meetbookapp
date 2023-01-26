<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booked;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return \view('front.pages.index');
    }

    public function agenda()
    {
        $now = Carbon::now();
        $d = $now->toDateString();
        $date_index = $now->toFormattedDateString();
        $room = Room::all();
        $transaction = Booked::with('user')->whereDate('start_date', $d)
            ->orderBy('start_date', 'asc')
            ->get();
        return \view('front.pages.agenda-index', [
            'room' => $room,
            'booked' => $transaction,
            'd' => $date_index
        ]);
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view('front.pages.agenda-detail', ['room' => $room]);
    }

    public function create($id)
    {
        $room = Room::findOrFail($id);

        return $room;
    }
}
