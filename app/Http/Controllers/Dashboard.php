<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return \view('front.pages.index');
    }

    public function agenda()
    {
        return \view('front.pages.agenda');
    }
}
