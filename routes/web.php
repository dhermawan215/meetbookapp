<?php

use App\Http\Controllers\Agenda;
use App\Http\Controllers\AdminRoom;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBookTransaction;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/agenda', [Dashboard::class, 'agenda'])->name('agenda');
// Route::get('/home', [Dashboard::class, 'index'])->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::prefix('app')
    ->middleware(['auth:sanctum', config('jetstream.auth_session'),  'verified'])
    ->group(function () {
        Route::get('/', [Dashboard::class, 'index'])->name('app.dashboard');
        Route::resource('agenda', Agenda::class);
    });

Route::prefix('dashboard')
    ->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->middleware('admin')
    ->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('room', AdminRoom::class);
        Route::resource('transaction', AdminBookTransaction::class);
    });
