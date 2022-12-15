<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Agenda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idAuth = Auth::user()->id;
        $data = Booked::with('rooms', 'user')->where('user_id', $idAuth)->get();
        return \view('front.pages.agenda.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = Room::get();
        return \view('front.pages.agenda.create', [
            'room' => $room
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {

        $now = Carbon::now();
        $auth = Auth::user()->id;
        $d = $now->day;
        $m = $now->month;
        $Y = $now->year;
        $second = $now->second;
        $roomid = $request->room_id;
        $data = $request->all();
        //format nomer booking
        //tahun bulan hari ruang user user detik
        $book_no = $Y . $m . $d . ' ' . $roomid . ' ' . $auth . $second;

        Booked::create([
            'book_no' => $book_no,
            'activity' => $data['activity'],
            'topic' => $data['topic'],
            'room_id' => $data['room_id'],
            'user_id' => $data['user_id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'participants' => $data['participants'],
            'note' => $data['note']
        ]);

        return \redirect()->route('agenda.index')->with('success', 'agenda saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Booked::with('rooms', 'user')->findOrFail($id);
        return \view('front.pages.agenda.details', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::get();
        $data = Booked::with('rooms', 'user')->findOrFail($id);
        return \view('front.pages.agenda.edit', [
            'data' => $data,
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();
        $trsc = Booked::find($id);
        $trsc->update($data);
        return \redirect()->route('agenda.index')->with('info', 'agenda updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
