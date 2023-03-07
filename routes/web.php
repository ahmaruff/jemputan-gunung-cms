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
});