<?php

use App\Http\Controllers\ArticleWriterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooktypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ReferencebookController;
use App\Http\Controllers\ReferencebooktypeController;
use App\Http\Controllers\SendcreationController;
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

Route::get('/contact', [WebController::class, 'contact']);

// Book Type
Route::get('/book_type/{id}', [WebController::class, 'book_type']);

// Reference Book
Route::get('/reference_book/{id}', [WebController::class, 'reference_book']);
Route::get('/reference_book_detail/{id}', [WebController::class, 'reference_book_detail']);

// Blog
Route::get('/blog/detail/{id}', [WebController::class, 'blog_detail']);

Route::get('/send_creation', [WebController::class, 'send_creation']);

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/login', [AuthController::class, 'login'])->name('login')->withoutMiddleware('auth');
        Route::post('/login', [AuthController::class, 'auth'])->withoutMiddleware('auth');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index']);

        // Book
        Route::get('/book', [BookController::class, 'index']);
        Route::post('/book', [BookController::class, 'add']);
        Route::get('/book/edit/{id}', [BookController::class, 'edit']);
        Route::patch('/book', [BookController::class, 'update']);
        Route::delete('/book', [BookController::class, 'destroy']);
        Route::post('/book_filter', [BookController::class, 'book_filter']);

        // Author
        Route::get('/author', [AuthorController::class, 'index']);
        Route::post('/author', [AuthorController::class, 'add']);
        Route::patch('/author', [AuthorController::class, 'update']);
        Route::delete('/author', [AuthorController::class, 'destroy']);

        // Theme
        Route::get('/theme', [ThemeController::class, 'index']);
        Route::post('/theme', [ThemeController::class, 'add']);
        Route::patch('/theme', [ThemeController::class, 'update']);
        Route::delete('/theme', [ThemeController::class, 'destroy']);

        // Website
        Route::get('/homepage', [HomepageController::class, 'index']);
        Route::post('/homepage/banner', [BannerController::class, 'add']);
        Route::patch('/homepage/banner', [BannerController::class, 'update']);
        Route::delete('/homepage/banner', [BannerController::class, 'destroy']);
        Route::patch('/homepage/book_of_the_month', [HomepageController::class, 'book_of_the_month']);
        Route::patch('/homepage/audio_book_homepage', [HomepageController::class, 'audio_book_homepage']);
        Route::patch('/homepage/send_creation', [HomepageController::class, 'send_creation']);

        // Book Type
        Route::get('/book_type/{id}', [BooktypeController::class, 'index']);
        Route::patch('/book_type/{id}', [BooktypeController::class, 'update']);

        // Reference Book
        Route::get('/reference_book/{id}', [ReferencebookController::class, 'index']);
        Route::post('/reference_book/{id}', [ReferencebookController::class, 'add']);
        Route::delete('/reference_book/{id}', [ReferencebookController::class, 'destroy']);
        Route::get('/reference_book/edit/{id}', [ReferencebookController::class, 'edit']);
        Route::patch('/reference_book/edit/{id}', [ReferencebookController::class, 'update']);
        Route::post('/reference_book/book_filter/{id}', [ReferencebookController::class, 'book_filter']);

        // Reference Book Type
        Route::patch('/reference_book_type/{id}', [ReferencebooktypeController::class, 'update']);

        // Blog
        Route::get('/blog/{id}', [BlogController::class, 'index']);
        Route::delete('/blog/{id}/create', [BlogController::class, 'destroy']);
        Route::get('/blog/{id}/create', [BlogController::class, 'create']);
        Route::post('/blog/{id}/create', [BlogController::class, 'store']);
        Route::get('/blog/{id}/edit/{blog_id}', [BlogController::class, 'edit']);
        Route::patch('/blog/{id}/edit/{blog_id}', [BlogController::class, 'update']);

        // Article Writer
        Route::get('/blog/{id}/writer', [ArticleWriterController::class, 'index']);
        Route::post('/blog/{id}/writer', [ArticleWriterController::class, 'store']);
        Route::patch('/blog/{id}/writer', [ArticleWriterController::class, 'update']);
        Route::delete('/blog/{id}/writer', [ArticleWriterController::class, 'destroy']);

        // Send Creation
        Route::get('/send_creation', [SendcreationController::class, 'index']);
        Route::patch('/send_creation', [SendcreationController::class, 'update']);
        Route::patch('/send_creation/banner', [SendcreationController::class, 'banner']);

    });

});