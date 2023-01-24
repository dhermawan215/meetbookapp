<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return \view('front.pages.index');
    }

    public function agenda()
    {
        $room = Room::all();
        return \view('front.pages.agenda-index', ['room' => $room]);
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
