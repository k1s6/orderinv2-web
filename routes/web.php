<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\DaftarSnackController;
use App\Http\Controllers\DaftarSteakController;
use App\Http\Controllers\LandingpageController;
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

// Route::get('/chart/{id}', 
// [TransactionController::class, 'show']);

Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage'); // memberi nama rute 'landingpage'


Route::post('/landingpage/validate', [LandingpageController::class, 'validateName'])->name('landingpage.validate');

Route::get('/daftarmenu', [MakananController::class, 'index'])->name('frontend.daftarmanakan');

Route::get('/daftarmenu1', [DaftarMinumanController::class, 'index'])->name('frontend.daftarminuman');
 
Route::get('/daftarmenu2', [DaftarSnackController::class, 'index'])->name('frontend.daftarsnack');

Route::get('/daftarmenu3', [DaftarSteakController::class, 'index'])->name('frontend.daftarsteak');

Route::get('/cart/{id}', [TransactionController::class, 'show'])->name('cart.index');

Route::get('/berhasil', function () {
    return view('berhasilmemesan');
})->name('frontend.berhasil');

Route::post('/cart/post', [TransactionController::class, 'store'])->name('transaksi.store');

// Route::post('/apimobileorderin/login', [LoginMobileController::class, 'login']);