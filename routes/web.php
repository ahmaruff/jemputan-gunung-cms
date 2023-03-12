<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[\App\Http\Controllers\Home\HomeController::class, 'index']);
Route::get('/kontak',[\App\Http\Controllers\Home\HomeController::class, 'kontak']);
Route::get('/tentang',[\App\Http\Controllers\Home\HomeController::class, 'tentang']);

Route::group(['prefix' => 'trip'], function() {
    Route::get('/',[\App\Http\Controllers\Home\TripController::class, 'index']);
});

// AUTH --------------------------------------------------------------
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLoginView']);
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLoginAction'])->name('login');

Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'adminRegisterView']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'adminRegisterAction']);

Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');


// ADMIN --------------------------------------------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class,'profile']);
    Route::put('/profile', [App\Http\Controllers\Admin\AdminController::class,'profileUpdateAction']);

    Route::get('/account', [App\Http\Controllers\Admin\AccountController::class,'index']);
    Route::get('/account/create', [App\Http\Controllers\Admin\AccountController::class,'create']);
    Route::post('/account/create', [App\Http\Controllers\Admin\AccountController::class,'store']);
    Route::get('/account/{id}', [App\Http\Controllers\Admin\AccountController::class,'show'])->whereNumber('id');
    Route::put('/account/{id}', [App\Http\Controllers\Admin\AccountController::class,'update'])->whereNumber('id');
    Route::get('/account/{id}/delete', [App\Http\Controllers\Admin\AccountController::class,'destroy'])->whereNumber('id');

    Route::get('/trip',[App\Http\Controllers\Admin\TripController::class, 'index'])->name('admin-trip');
    Route::get('/trip/destinasi',[App\Http\Controllers\Admin\TripController::class, 'destinasiIndex']);
    Route::get('/trip/fasilitas',[App\Http\Controllers\Admin\TripController::class, 'fasilitasIndex']);
});