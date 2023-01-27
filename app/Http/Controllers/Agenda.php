<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Jakarta');

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
        $masuk = $request->all();
        //format nomer booking
        //tahun bulan hari ruang user user detik
        $book_no = $Y . $m . $d . ' ' . $roomid . ' ' . $auth . $second;


        //validasi form khusus jam tanggal meeting
        // $is_accepted = true;
        $start_date_from_form = Carbon::parse($masuk['start_date']);
        $end_date_from_form = Carbon::parse($masuk['end_date']);

        $result_booking_meet = Booked::where('room_id', $roomid)
            ->where(function ($query) use ($start_date_from_form, $end_date_from_form) {
                $query->whereBetween('start_date',  [$start_date_from_form,  $end_date_from_form->subSecond()])
                    ->orWhereBetween('end_date', [$start_date_from_form,  $end_date_from_form->subSecond()]);
                // $query->where(('start_date', '>=', $start_date_from_form), 'AND' ,($end_date_from_form,  '>=', 'end_date'))
                //     ->orWhere('end_date', '>=', $start_date_from_form, 'AND',  $end_date_from_form, '<=', 'end_date')
                //     ->where('start_date', '>=', $start_date_from_form, 'AND', 'start_date', '<=', $end_date_from_form)
                //     ->orWhere('end_date', '>=', $start_date_from_form, 'AND', 'end_date', '<=', $end_date_from_form);
            })->get();
        // \ddd($result_booking_meet);

        if ($result_booking_meet->isEmpty()) {
            $save = Booked::create([
                'book_no' => $book_no,
                'activity' => $masuk['activity'],
                'topic' => $masuk['topic'],
                'room_id' => $masuk['room_id'],
                'user_id' => $masuk['user_id'],
                'start_date' => $start_date_from_form,
                'end_date' =>  $end_date_from_form,
                'participants' => $masuk['participants'],
                'note' => $masuk['note']
            ]);

            return \redirect()->route('agenda.index')->with('success', 'agenda saved!');
        } else {
            return \redirect()->route('agenda.create')->with('danger', 'Oops, The agenda you chose is not available, please select another date/time');
        }
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
        // $room = Room::get();
        // $data = Booked::with('rooms', 'user')->findOrFail($id);
        // return \view('front.pages.agenda.edit', [
        //     'data' => $data,
        //     'room' => $room
        // ]);
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
        // $data = $request->all();
        // $trsc = Booked::find($id);
        // $trsc->update($data);
        // return \redirect()->route('agenda.index')->with('info', 'agenda updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Booked::findOrFail($id);
        $agenda->delete();
        return \redirect()->route('agenda.index')->with('danger', 'agenda deleted!');
    }
}
