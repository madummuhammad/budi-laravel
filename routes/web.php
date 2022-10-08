<?php

use App\Http\Controllers\ArticleWriterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooktypeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MylibraryController;
use App\Http\Controllers\ReferencebookController;
use App\Http\Controllers\ReferencebooktypeController;
use App\Http\Controllers\ReferencethemeController;
use App\Http\Controllers\SendcreationController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
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

Route::middleware('visitor', 'analytics')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/login', [VisitorController::class, 'login']);
        Route::post('/login', [VisitorController::class, 'auth_login']);
        Route::post('/logout', [VisitorController::class, 'logout']);
        Route::get('/register', [VisitorController::class, 'register']);
        Route::post('/register', [VisitorController::class, 'auth_register']);
        Route::get('/confirm/{id}', [VisitorController::class, 'confirm']);

        Route::post('/email', [WebController::class, 'message']);

        // Route::get('/pdf', [WebController::class, 'pdf']);

        // Profile
        Route::get('/profile', [VisitorController::class, 'index']);
        Route::patch('/profile', [VisitorController::class, 'update']);
        Route::patch('/profile_image', [VisitorController::class, 'profile_image']);
        Route::delete('/profile_image', [VisitorController::class, 'delete_profile']);

        // My Library
        Route::get('/mylibrary', [WebController::class, 'my_library']);
        Route::post('/mylibrary', [WebController::class, 'my_library_filter']);
        Route::post('/saved', [MylibraryController::class, 'saved']);
        Route::post('/liked', [MylibraryController::class, 'liked']);
        Route::post('/share', [MylibraryController::class, 'share']);
        Route::post('/being_read', [MylibraryController::class, 'being_read']);
        Route::post('/done', [MylibraryController::class, 'done']);
        Route::post('/next', [MylibraryController::class, 'next']);
        Route::post('/downloaded', [MylibraryController::class, 'download']);

        // Route::post('/mylibrarydigital', [MylibraryController::class, 'digital']);
        // Route::post('/mylibrarykomik', [MylibraryController::class, 'komik']);
        // Route::post('/mylibraryaudio', [MylibraryController::class, 'audio']);
        // Route::post('/mylibraryvideo', [MylibraryController::class, 'video']);

        Route::get('/', [WebController::class, 'index']);
        Route::get('/book/{id}', [WebController::class, 'book']);
        Route::get('/book/{id}/read', [WebController::class, 'read']);
        Route::post('/download', [BookController::class, 'download']);

        // Comment
        Route::post('/comment', [CommentController::class, 'add']);

        Route::get('/contact', [WebController::class, 'contact']);

        // Book Type
        Route::get('/book_type/{id}', [WebController::class, 'book_type']);
        Route::post('/book_type/{id}', [WebController::class, 'book_type_filter']);

        // Reference Book
        Route::get('/reference_book/{id}', [WebController::class, 'reference_book']);
        Route::post('/reference_book/{id}', [WebController::class, 'reference_book_filter']);
        Route::get('/reference_book_detail/{id}', [WebController::class, 'reference_book_detail']);

        Route::post('/reference_liked', [ReferenceBookController::class, 'liked']);
        Route::post('/reference_download', [ReferenceBookController::class, 'download']);
        Route::post('/reference_downloaded', [ReferenceBookController::class, 'downloaded']);
        Route::post('/reference_comment', [ReferenceBookController::class, 'comment']);
        Route::post('/reference_share', [ReferenceBookController::class, 'share']);

        // Blog
        Route::get('/blog/detail/{id}', [WebController::class, 'blog_detail']);
        Route::post('/blog/detail/{id}', [WebController::class, 'blog_liked']);

        Route::get('/send_creation', [WebController::class, 'send_creation']);

        // Homebook
        Route::post('/homebookfilter', [WebController::class, 'homebookfilter']);

        // Author
        Route::get('/author_profile', [WebController::class, 'author_profile']);
        Route::post('/author_profile', [WebController::class, 'author_profile_liked']);
        // Info seputar budi
        Route::get('/info_seputar_budi', [WebController::class, 'info_seputar_budi']);

        // Tentang Budi
        Route::get('/about', [WebController::class, 'about']);

        // Policy
        Route::get('/policy', [WebController::class, 'policy']);

        // Set Cookies
        Route::post('/set_cookie', [WebController::class, 'set_cookies']);

        // Search
        Route::get('/search', [WebController::class, 'search']);

        Route::get('/province', [LocationController::class, 'province']);
        Route::get('/city/{id}', [LocationController::class, 'city']);
        Route::get('/district/{id}', [LocationController::class, 'district']);
        Route::get('/sub_district/{id}', [LocationController::class, 'sub_district']);
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/login', [AuthController::class, 'login'])->name('login')->withoutMiddleware('auth');
        Route::post('/login', [AuthController::class, 'auth'])->withoutMiddleware('auth');
        Route::get('/logout', [AuthController::class, 'logout']);

        // Dashboard
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/comment', [CommentController::class, 'allcomment']);

        // Book
        Route::get('/book', [BookController::class, 'index']);
        Route::post('/upload', [UploadController::class, 'upload'])->name('dashboard.upload');
        Route::get('/book/comment/{id}', [CommentController::class, 'dashboard']);
        Route::delete('/book/comment/{id}', [CommentController::class, 'destroy']);
        Route::patch('/book/comment/{id}', [CommentController::class, 'update']);
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

        // Pustakaku
        Route::get('/pustakaku', [MylibraryController::class, 'index']);
        Route::patch('/pustakaku', [MylibraryController::class, 'update']);

        // Theme
        Route::get('/theme', [ThemeController::class, 'index']);
        Route::post('/theme', [ThemeController::class, 'add']);
        Route::patch('/theme', [ThemeController::class, 'update']);
        Route::delete('/theme', [ThemeController::class, 'destroy']);

        // Theme
        Route::get('/reference_theme', [ReferencethemeController::class, 'index']);
        Route::post('/reference_theme', [ReferencethemeController::class, 'add']);
        Route::patch('/reference_theme', [ReferencethemeController::class, 'update']);
        Route::delete('/reference_theme', [ReferencethemeController::class, 'destroy']);

        // Website
        Route::get('/homepage', [HomepageController::class, 'index']);
        Route::post('/homepage/banner', [BannerController::class, 'add']);
        Route::post('/homepage/bannermobile', [BannerController::class, 'add_mobile']);
        Route::patch('/homepage/banner', [BannerController::class, 'update']);
        Route::patch('/homepage/bannermobile', [BannerController::class, 'update_mobile']);
        Route::delete('/homepage/banner', [BannerController::class, 'destroy']);
        Route::delete('/homepage/bannermobile', [BannerController::class, 'destroy_mobile']);
        Route::patch('/homepage/book_of_the_month', [HomepageController::class, 'book_of_the_month']);
        Route::post('/homepage/book_of_the_month', [HomepageController::class, 'add_book_of_the_month']);
        Route::patch('/homepage/audio_book_homepage', [HomepageController::class, 'audio_book_homepage']);
        Route::post('/homepage/audio_book_homepage', [HomepageController::class, 'add_audio_book_homepage']);
        Route::patch('/homepage/send_creation', [HomepageController::class, 'send_creation']);
        Route::post('/homepage/section_six', [HomepageController::class, 'section_six_add']);
        Route::patch('/homepage/section_six', [HomepageController::class, 'section_six']);
        Route::delete('/homepage/section_six', [HomepageController::class, 'section_six_delete']);

        // Footer
        Route::get('/footer', [FooterController::class, 'index']);
        Route::patch('/footer', [FooterController::class, 'update']);

        // About Budi
        Route::get('about/{id}',[AboutController::class,'about']);
        Route::patch('about/{id}',[AboutController::class,'update']);
        Route::patch('about_content/{id}',[AboutController::class,'update_content']);
        Route::get('information/{id}',[AboutController::class,'about']);

        // Book Type
        Route::get('/book_type/{id}', [BooktypeController::class, 'index']);
        Route::patch('/book_type/{id}', [BooktypeController::class, 'update']);
        Route::patch('/book_type/mobile/{id}', [BooktypeController::class, 'update_mobile']);

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
        Route::get('/blog/banner', [BlogController::class, 'banner']);
        Route::patch('/blog/banner', [BlogController::class, 'banner_update']);

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

        // Visitor
        Route::get('/visitor', [VisitorController::class, 'visitor_get']);
        Route::delete('/visitor', [VisitorController::class, 'destroy']);

        // User
        Route::get('/admin', [UserController::class, 'index']);
        Route::post('/admin', [UserController::class, 'store']);
        Route::delete('/admin', [UserController::class, 'destroy']);
        Route::patch('/admin', [UserController::class, 'update']);

        Route::get('/author_of_the_month', [WebController::class, 'author_of_the_month']);
        Route::patch('/author_of_the_month', [WebController::class, 'author_of_the_month_edit']);

        // Statistic Visitor
        Route::get('/statistic/visitor', [StatisticController::class, 'visitor']);
        Route::get('/statistic/visitor/{id}', [StatisticController::class, 'profiling']);
        Route::get('/statistic/book', [StatisticController::class, 'book']);
        Route::get('/statistic/referensi', [StatisticController::class, 'referensi']);
        Route::get('/statistic/referensi/comment/{id}', [StatisticController::class, 'referensi_comment']);
        Route::patch('/statistic/referensi/comment/{id}', [StatisticController::class, 'edit_referensi_comment']);
        Route::delete('/statistic/referensi/comment/{id}', [StatisticController::class, 'delete_reference_comment']);

        Route::get('statistic/book/export', [StatisticController::class, 'book_statistic_export']);
        Route::get('statistic/referensi/export', [StatisticController::class, 'referensi_statistic_export']);
        Route::get('/visitor/export', [StatisticController::class, 'visitor_export']);
        Route::get('/visitor/today/export', [StatisticController::class, 'visitor_today_export']);
        Route::get('/visitor/alltime/export', [StatisticController::class, 'visitor_alltime_export']);
        Route::get('/visitor/profiling/export/{id}', [StatisticController::class, 'visitor_profiling_export']);
        Route::get('/book/export', [StatisticController::class, 'book_export']);
        Route::get('/book/export', [StatisticController::class, 'book_export']);

        // Visitor Profiling
        Route::get('/visitor/profiling/{id}', [VisitorController::class, 'profiling']);
        Route::get('/visitor/member/profiling/export/{id}', [StatisticController::class, 'member_profiling_export']);

    });

});