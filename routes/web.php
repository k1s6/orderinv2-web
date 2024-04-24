<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginMobileController;
use App\Http\Controllers\TransactionController;

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
    return view('welcome');
});

Route::get('/chart/{id}', 
[TransactionController::class, 'show']);

Route::get('/landingpage', function () {
    return view('landingpage');
});

// Route::get('/daftarmakanan', function() {
//     return view('daftarmakanan');
// });

// Route::get('/daftarminuman', function() {
//     return view('daftarminuman');
// });

Route::get('/daftarmakanan', [MenuController::class, 'makanan'])->name('daftarmakanan');
Route::get('/daftarminuman', [MenuController::class, 'minuman'])->name('daftarminuman');


// Route::post('/apimobileorderin/login', [LoginMobileController::class, 'login']);