<?php

namespace App\Http\Controllers;

use App\Models\UserAttendance;
use Illuminate\Http\Request;
use App\Models\UserRegistered;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Galadinner extends Controller
{
    public function index()
    {
        // $data = Carbon::now();
        // \ddd($data);
        $user = DB::table('user_registered')
            ->select('user_registered.id AS id_reg', 'user_registered.name AS name_reg')
            ->leftJoin('user_attendace', 'user_registered.id', '=', 'user_attendace.user_registered_id')
            ->whereNull('user_attendace.user_registered_id')
            ->get();
        // $user = UserRegistered::LeftJoin('user_attendace', function ($join) {
        //     $join->on('user_registered.id', '=', 'user_attendace.user_registered_id');
        // })->whereNull('user_attendace.user_registered_id')->get();
        return \view('front.pages.galadinner', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['registered_at'] = Carbon::now();

        $regiesterd = UserAttendance::create($data);
        return \redirect()->route('galadiner.success', $regiesterd->id);
    }

    public function success($id)
    {
        $user = UserAttendance::with('userRegistered')->findOrFail($id);
        return \view('front.pages.galadinner-success', [
            'user' => $user
        ]);
    }
}
