<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Booked;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AgendaRestController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $room_id = $data['room_id'];

        $now = Carbon::now();
        $d = $now->toDateString();

        $transaction = Booked::with('user', 'rooms')
            ->where('room_id', $room_id)
            ->whereDate('start_date', $d)
            ->orderBy('start_date', 'asc')
            ->get();

        // check if data null
        if ($transaction->isEmpty()) {
            return ResponseFormatter::error('null', 'Data Not Found', 404);
        } else {
            return ResponseFormatter::success($transaction, 'success');
        }
    }

    public function date(Request $request)
    {
        $data = $request->all();
        $d = $data['date'];
        $room_id = $data['room_id'];
        $transaction = Booked::with('user', 'rooms')
            ->where('room_id', $room_id)
            ->whereDate('start_date', $d)
            ->orderBy('start_date', 'asc')
            ->get();
        // check if data null
        if ($transaction->isEmpty()) {
            return ResponseFormatter::error('null', 'Data Not Found', 404);
        } else {
            return ResponseFormatter::success($transaction, 'success');
        }
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $auth = $request->user_id;
        $d = $now->day;
        $m = $now->month;
        $Y = $now->year;
        $second = $now->second;
        $roomid = $request->room_id;
        $masuk = $request->all();
        //format nomer booking
        //tahun bulan hari ruang user user detik
        $book_no = $Y . $m . $d . ' ' . $roomid . ' ' . $auth . $second;

        //validasi request

        $validator = Validator::make($request->all(), [
            'activity' => 'required',
            'topic' => 'required',
            'room_id' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'participants' => 'nullable',
            'note' => 'nullable',
        ]);
        // jika validasi salah
        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors()->all(), 'Validation error', 400);
        }

        //validasi form khusus jam tanggal meeting
        // $is_accepted = true;
        $start_date_from_form = Carbon::parse($masuk['start_date']);
        $end_date_from_form = Carbon::parse($masuk['end_date']);

        $result_booking_meet = Booked::where('room_id', $roomid)
            ->where(function ($query) use ($start_date_from_form, $end_date_from_form) {
                $query->whereBetween('start_date',  [$start_date_from_form,  $end_date_from_form->subSecond()])
                    ->orWhereBetween('end_date', [$start_date_from_form,  $end_date_from_form->subSecond()]);
            })->get();


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

            return ResponseFormatter::success($save, 'success');
        }
        // } else {
        //     return ResponseFormatter::error('error, please change your date/time agenda', 'Change Your Date', 404);
        // }
    }
}
