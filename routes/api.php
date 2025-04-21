<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginMobileController;
use App\Http\Controllers\MobileAPI\MobileUserController;
use App\Http\Controllers\MobileAPI\ProductController;
use App\Http\Controllers\MobileAPI\TransactionController;
use App\Http\Controllers\TransactionController as TransactionControllerWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/apimobileorderin'], function () {
    Route::post('/login', [MobileUserController::class, 'signinEmail']);
    Route::get('/dataproduct/{jenis}', [ProductController::class, 'getDataProduct']);
    Route::post('/uploadproduct/store', [ProductController::class, 'storeProduct']);
    Route::put('/product/{id}', [ProductController::class, 'updateProduct']);
    Route::get('/delproduct/{id}', [ProductController::class, 'destroyProduct']);
    Route::get('/findproduct/{jenis}', [ProductController::class, 'searchProduct']);
    Route::post('/upload-img', [ProductController::class, 'uploadImage']);
    Route::get('/transaction/{status}', [TransactionController::class, 'showPesananIn']);
    Route::put('/transactionupdate/{id}', [TransactionController::class, 'updatePesanan']);
    Route::get('/user/userdump', [MobileUserController::class, 'addUserData']);
    Route::post('/cart/post', [CartController::class, 'store'])->name('cart.transactioninsert');
});

// Route::post('/apimobileorderin/login', [LoginMobileController::class, 'login']);
Route::get('/getProduct', [Controller::class, 'getProduct']);
Route::post('/cart/post', [TransactionControllerWeb::class, 'store']);
