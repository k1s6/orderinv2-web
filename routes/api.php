<?php

use App\Http\Controllers\LoginMobileController;
use App\Http\Controllers\MobileAPI\MobileUserController;
use App\Http\Controllers\MobileAPI\ProductController;
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

Route::group(['prefix' => '/apimobileorderin'], function(){
    Route::post('/login', [MobileUserController::class, 'signinEmail']);
    Route::get('/dataproduct/{jenis}', [ProductController::class, 'getDataProduct']);
    Route::post('/uploadproduct/store', [ProductController::class, 'storeProduct']);
    Route::put('/product/{id}', [ProductController::class, 'updateProduct']);
    Route::get('/delproduct/{id}', [ProductController::class, 'destroyProduct']);
});

// Route::post('/apimobileorderin/login', [LoginMobileController::class, 'login']);
