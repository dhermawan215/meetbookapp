<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Booked;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AgendaRestController extends Controller
{
    public function index(Request $request)
    {
        // $date = "2022-12-19";
        // // cek request date 
        // if ($date) {
        //     $transaction = Booked::with('user', 'rooms')->where('start_date', $date)->get();
        //     // check if data null
        //     if ($transaction->isEmpty()) {
        //         return ResponseFormatter::error('null', 'Data Note Found', 404);
        //     } else {
        //         return ResponseFormatter::success($transaction, 'success');
        //     }
        // } else {
        $data = $request->all();
        // Log::info($data);
        $room_id = $data['room_id'];

        $now = Carbon::now();
        $d = $now->toDateString();
        // $d = "2022-12-28";
        $transaction = Booked::with('user', 'rooms')
            ->where('room_id', $room_id)
            ->whereDate('start_date', $d)
            ->get();
        // check if data null
        if ($transaction->isEmpty()) {
            return ResponseFormatter::error('null', 'Data Note Found', 404);
        } else {
            return ResponseFormatter::success($transaction, 'success');
        }
    }

    public function date(Request $request)
    {
        $data = $request->all();
        // Log::info($data);
        $d = $data['date'];
        $room_id = $data['room_id'];
        $transaction = Booked::with('user', 'rooms')
            ->where('room_id', $room_id)
            ->whereDate('start_date', $d)
            ->get();
        // check if data null
        if ($transaction->isEmpty()) {
            return ResponseFormatter::error('null', 'Data Note Found', 404);
        } else {
            return ResponseFormatter::success($transaction, 'success');
        }
    }
}
