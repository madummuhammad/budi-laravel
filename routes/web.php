<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooktypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index']);
Route::get('/book/{id}', [WebController::class, 'book']);

// Book Type
Route::get('/book_type/{id}', [WebController::class, 'book_type']);

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/login', [AuthController::class, 'login'])->name('login')->withoutMiddleware('auth');
        Route::post('/login', [AuthController::class, 'auth'])->withoutMiddleware('auth');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index']);

        // Book
        Route::get('/book', [BookController::class, 'index']);
        Route::post('/book', [BookController::class, 'add']);
        Route::delete('/book', [BookController::class, 'destroy']);

        // Theme
        Route::get('/theme', [ThemeController::class, 'index']);
        Route::post('/theme', [ThemeController::class, 'add']);
        Route::delete('/theme', [ThemeController::class, 'destroy']);

        // Website
        Route::get('/homepage', [HomepageController::class, 'index']);
        Route::post('/homepage/banner', [BannerController::class, 'add']);
        Route::delete('/homepage/banner', [BannerController::class, 'destroy']);

        // Book Type
        Route::get('/book_type/{id}', [BooktypeController::class, 'index']);
        Route::patch('/book_type/{id}', [BooktypeController::class, 'update']);

        // Reference Book
        // Route::get('/reference_book/{id}')

    });

});