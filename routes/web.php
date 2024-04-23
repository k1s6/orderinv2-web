<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginMobileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DaftarMakananController;
use App\Http\Controllers\DaftarMinumanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/chart/{id}', 
[TransactionController::class, 'show']);

Route::get('/landingpage', function () {
    return view('landingpage');
});

Route::get('/daftarmenu', function() {
    return view('daftarmakanan');
});

Route::get('/daftarmenu1', function() {
    return view('daftarminuman');
});
 
Route::get('/daftarmakan', [DaftarMakananController::class, 'index'])->name('daftarmakan');
Route::get('/daftarminuman', [DaftarMinumanController::class, 'index'])->name('daftarminuman');

// Route::get('/input-nama', [NamaController::class, 'tampilFormulir'])->name('input-nama');
// Route::post('/submit-nama', [NamaController::class, 'simpanNama'])->name('submit-nama');

// Route::post('/apimobileorderin/login', [LoginMobileController::class, 'login']);