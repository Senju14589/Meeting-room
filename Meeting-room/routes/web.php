<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('/meeting/all', [MeetingController::class, 'index'])->name('meeting');
    Route::post('/meeting/add', [MeetingController::class, 'store'])->name('addMeeting');
    Route::get('/meeting/edit/{id}', [MeetingController::class, 'edit']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});