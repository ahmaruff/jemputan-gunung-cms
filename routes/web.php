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
Route::get('/cari',[\App\Http\Controllers\Home\HomeController::class, 'cariTrip']);
Route::get('/kontak',[\App\Http\Controllers\Home\HomeController::class, 'kontak']);
Route::get('/tentang',[\App\Http\Controllers\Home\HomeController::class, 'tentang']);
Route::get('/faq',[\App\Http\Controllers\Home\HomeController::class, 'faq']);

Route::group(['prefix' => 'trip'], function() {
    Route::get('/',[\App\Http\Controllers\Home\TripController::class, 'index'])->name('home.trip');
    Route::get('/{id}',[\App\Http\Controllers\Home\TripController::class, 'show'])->whereNumber('id');
    // Route::post('/search',[\App\Http\Controllers\Home\TripController::class, 'search']);
});

// BLOG --------------------------------------------------------------
Route::get('/blog', [\App\Http\Controllers\Home\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{category}', [\App\Http\Controllers\Home\BlogController::class, 'category'])->where(['category' => '^[a-z0-9]+(?:-[a-z0-9]+)*$',])->name('blog.category');

// Redirect to blog (lihat route atasnya)
Route::get('/blog/{category}/{num}', function( String $category, $id) {
    return redirect()->to(route('blog.category', $category));
})->where(['category' => '^[a-z0-9]+(?:-[a-z0-9]+)*$','num' => '[0-9]+']);

// BLOG POST USING SLUG & VALIDATE WITH REGEX
Route::get('/blog/{category}/{id}/{slug}', [\App\Http\Controllers\Home\BlogController::class, 'show'])->where([
    'category'  => '^[a-z0-9]+(?:-[a-z0-9]+)*$',
    'slug'      => '^[a-z0-9]+(?:-[a-z0-9]+)*$',
    'id'        => '[0-9]+'])
    ->name('blog.show');

// AUTH --------------------------------------------------------------
Route::get('/login/admin', [\App\Http\Controllers\Auth\LoginController::class, 'adminLoginView']);
Route::post('/login/admin', [\App\Http\Controllers\Auth\LoginController::class, 'adminLoginAction'])->name('login');

Route::get('/register/admin', [\App\Http\Controllers\Auth\RegisterController::class, 'adminRegisterView']);
Route::post('/register/admin', [\App\Http\Controllers\Auth\RegisterController::class, 'adminRegisterAction']);

Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');


// ADMIN --------------------------------------------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function() {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/profile', [\App\Http\Controllers\Admin\AdminController::class,'profile']);
    Route::put('/profile', [\App\Http\Controllers\Admin\AdminController::class,'profileUpdateAction']);

    Route::get('/account', [\App\Http\Controllers\Admin\AccountController::class,'index']);
    Route::get('/account/create', [\App\Http\Controllers\Admin\AccountController::class,'create']);
    Route::post('/account/create', [\App\Http\Controllers\Admin\AccountController::class,'store']);
    Route::get('/account/{id}', [\App\Http\Controllers\Admin\AccountController::class,'show'])->whereNumber('id');
    Route::put('/account/{id}', [\App\Http\Controllers\Admin\AccountController::class,'update'])->whereNumber('id');
    Route::get('/account/{id}/delete', [\App\Http\Controllers\Admin\AccountController::class,'destroy'])->whereNumber('id');

    Route::get('/trip',[\App\Http\Controllers\Admin\TripController::class, 'index'])->name('admin-trip');
    Route::get('/trip/create',[\App\Http\Controllers\Admin\TripController::class, 'create']);
    Route::post('/trip/create',[\App\Http\Controllers\Admin\TripController::class, 'store']);
    Route::get('/trip/{id}',[\App\Http\Controllers\Admin\TripController::class, 'show'])->whereNumber('id');
    Route::get('/trip/{id}/edit',[\App\Http\Controllers\Admin\TripController::class, 'edit'])->whereNumber('id');
    Route::put('/trip/{id}/edit',[\App\Http\Controllers\Admin\TripController::class, 'update'])->whereNumber('id');
    Route::get('/trip/{id}/delete',[\App\Http\Controllers\Admin\TripController::class, 'destroy'])->whereNumber('id');

    Route::get('/trip/fasilitas',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'index']);
    Route::get('/trip/fasilitas/create',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'create']);
    Route::post('/trip/fasilitas/create',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'store'])->name('store-fasilitas');
    Route::get('/trip/fasilitas/{id}',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'show'])->whereNumber('id');
    Route::put('/trip/fasilitas/{id}',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'update'])->whereNumber('id');
    Route::get('/trip/fasilitas/{id}/edit',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'show'])->whereNumber('id');
    Route::put('/trip/fasilitas/{id}/edit',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'update'])->whereNumber('id');
    Route::get('/trip/fasilitas/{id}/delete',[\App\Http\Controllers\Admin\TripFasilitasController::class, 'destroy'])->whereNumber('id');
    
    Route::get('/trip/destinasi',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'index']);
    Route::get('/trip/destinasi/create',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'create']);
    Route::post('/trip/destinasi/create',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'store'])->name('store-destinasi');
    Route::get('/trip/destinasi/{id}',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'show'])->whereNumber('id');
    Route::put('/trip/destinasi/{id}',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'update'])->whereNumber('id');
    Route::get('/trip/destinasi/{id}/edit',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'show'])->whereNumber('id');
    Route::put('/trip/destinasi/{id}/edit',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'update'])->whereNumber('id');
    Route::get('/trip/destinasi/{id}/delete',[\App\Http\Controllers\Admin\TripDestinasiController::class, 'destroy'])->whereNumber('id');
    
    Route::resource('faq',\App\Http\Controllers\Admin\FaqController::class);

    Route::group(['prefix' => 'blog'], function(){
        Route::get('/', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blog.home');
        Route::resource('category', \App\Http\Controllers\Admin\BlogCategoryController::class);
        Route::resource('post',\App\Http\Controllers\Admin\BlogPostController::class);
    });
});