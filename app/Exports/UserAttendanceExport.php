<?php

namespace App\Exports;

use Illuminate\View\View;
use App\Models\UserAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserAttendanceExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return UserAttendance::all();
    // }

    public function view(): View
    {
        return view('pages.galadinner.attendance.excel', [
            'data' => UserAttendance::with('userRegistered')->get(),
        ]);
    }
}
