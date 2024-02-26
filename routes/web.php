<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ManagementUserController;

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

// Route::get('/user', [ManagementUserController::class, 'index']);
// Route::get('/resource', ManagementUserController::class);



Route::resource('/user', PhotoController::class);

Route::get('/home', 
[HomeController::class, 'index']);

Route::get('/chart/{id}', 
[TransactionController::class, 'show']);


// Route::get('foo', function () {
//     return 'Hello World';
// });

// Route::get('user/{id}', function ($id) {
//     return 'User '.$id;
// });

// Route::get('posts/{post}/comments/{comments}', function($postId, $commentId) {
//     return 'postid => ' . $postId . ' commentId => ' . $commentId;
// });


// Route::get('user', [UserController::class, 'index']);


// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::option($uri, $callback);



// Route::match (['get', 'post'], '/', function () {
//     //
// });

// Route::any('/', function () {
//     // 
// });


// 3. CSRF Protection

// Route::get('/token', function (Request $request) {

// })

// 4. Redirect Route
// Route::redirect('/foo', '/welkam');
// Route::permanentRedirect('/foo', '/welkam');


// 5. Route View
// Route::view('/welkam', 'welcome');
// Route::view('/welkam', 'welcome', ['name' => 'Pramudya']);

// 6. Parameter opsional
// Route::get('pengguna/{name?}', function ($name = 'john') {
//     return 'pengguna => ' . $name;
// });

// 7. Regular Expression Constraints
// Route::get('penggunan/{name}', function ($name){
//     //
// })->where('name', '[A-Za-z]+');

// Route::get('pengguna/{id}', function ($id) {
//     //
// })->where('name', '[0-9]+');

// Route::get('pengguna/{id}/{name}', function ($id, $name){

// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


// 8. Global Constraints


// 9. Encoded Forward Slashes
// Route::get('search/{search}', function($search) {
//     return $search;
// })->where('search', '.*');

// acara 4

// Route::get('/user/profile', function () {
//     //
// })->name('profile');

// Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile');

// Generate URLs...
// $url = route('profile');

// // Generating Redirects...
// return redirect()->route('profile');

// return to_route('profile');



// Route::get('user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1]);



// Route::get('user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1, 'photos' => 'yes']);



// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second Middleware
//     });
    
//     Route::get('user/profile', function () {
//         // Uses first & second Middleware
//     });
// });


// Route::namespace('Admin')->group(function () {
//     // Controllers Within The "App\Http\Controllers\Admin" Namespace
// });

// Route::domain('{account}.myapp.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });

// Route::prefix('admin')->group(function() {
//     Route::get('users', function() {
//         //
//     });
// });

// Route::name('admin.')->group(function () {
//     Route::get('Users', function () {
//         //
//     })->name('users');
// });
