<?php

use App\Http\Controllers\API\AgendaRestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->group(function () {
Route::post('current', [AgendaRestController::class, 'index'])->name('api.dashboard');
Route::post('date', [AgendaRestController::class, 'date'])->name('api.date');
// });
