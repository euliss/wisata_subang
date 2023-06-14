<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Users;
use App\Http\Controllers\C_Categories;
use App\Http\Controllers\C_Destinations;
use App\Http\Controllers\C_Articles;
use App\Http\Controllers\C_News;
use App\Http\Controllers\C_Landing;
use App\Http\Controllers\C_Partner;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Comment;
use App\Http\Controllers\C_Reports;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// landing page
Route::get('/', [C_Landing::class, 'index'])->name('landing');
Route::get('/change-language', [C_Landing::class, 'changeLanguage']);
Route::get('/about', [C_Landing::class, 'about']);
Route::get('/category/{id}', [C_Landing::class, 'category']);
Route::get('/destination_search', [C_Landing::class, 'destination_search']);
Route::get('/destination/{id}', [C_Landing::class, 'destination']);

Route::get('/registrasi-user', [HomeController::class, 'registrasi']);
Route::post('/store-registrasi', [HomeController::class, 'store_registrasi']);
Route::get('/verification', [HomeController::class, 'verification']);

Route::get('/product-by-categories/{id}', [C_Landing::class, 'productByCategories']);
Route::get('/product-detail/{id}', [C_Landing::class, 'productDetail']);
Route::get('/landing-news', [C_Landing::class, 'news'])->name('landing-news');
Route::get('/landing-news/{id}', [C_Landing::class, 'newsDetail']);
// Route::get('/register', [C_Register::class, 'index']);


Route::post('/store-comment/{id_destination}', [C_Comment::class, 'store_comment']);


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/change-status/{status}/{id}', [App\Http\Controllers\HomeController::class, 'changeStatus']);

    // categories
    Route::get('/categories', [C_Categories::class, 'index'])->name('categories');
    Route::get('/add-categories', [C_Categories::class, 'add']);
    Route::post('/insert-categories', [C_Categories::class, 'insert']);
    Route::get('/edit-categories/{id}', [C_Categories::class, 'edit']);
    Route::post('/update-categories/{id}', [C_Categories::class, 'update']);
    Route::get('/delete-categories/{id}', [C_Categories::class, 'delete']);

    // destinations
    Route::get('/destinations', [C_Destinations::class, 'index'])->name('destinations');
    Route::get('/detail-destinations/{id}', [C_Destinations::class, 'detail']);
    Route::get('/add-destinations', [C_Destinations::class, 'add']);
    Route::post('/insert-destinations', [C_Destinations::class, 'insert']);
    Route::get('/edit-destinations/{id}', [C_Destinations::class, 'edit']);
    Route::post('/update-destinations/{id}', [C_Destinations::class, 'update']);
    Route::get('/delete-destinations/{id}', [C_Destinations::class, 'delete']);
    Route::get('/change-status-destinations/{id}/{status}', [C_Destinations::class, 'change_status']);

    Route::get('/comments-destination/{id}', [C_Destinations::class, 'comments']);
    Route::get('/add-comments/{id_destination}', [C_Destinations::class, 'comments_add']);
    Route::post('/insert-comments/{id_destination}', [C_Destinations::class, 'comments_insert']);
    Route::get('/edit-comments/{id}', [C_Destinations::class, 'comments_edit']);
    Route::post('/update-comments/{id}', [C_Destinations::class, 'comments_update']);
    Route::get('/delete-comments/{id}', [C_Destinations::class, 'comments_delete']);

    Route::get('/reports-destination/{id}', [C_Destinations::class, 'reports']);
    Route::get('/add-reports/{id_destination}', [C_Destinations::class, 'reports_add']);
    Route::post('/insert-reports/{id_destination}', [C_Destinations::class, 'reports_insert']);
    Route::get('/edit-reports/{id}', [C_Destinations::class, 'reports_edit']);
    Route::post('/update-reports/{id}', [C_Destinations::class, 'reports_update']);
    Route::get('/delete-reports/{id}', [C_Destinations::class, 'reports_delete']);

    Route::get('/report/', [C_Reports::class, 'index']);
    Route::get('/report/export_excel', [C_Reports::class, 'export_excel']);
    Route::get('/add-report', [C_Reports::class, 'add']);
    Route::post('/store-report', [C_Reports::class, 'store']);
    Route::get('/edit-report/{id}', [C_Reports::class, 'edit']);
    Route::post('/update-report/{id}', [C_Reports::class, 'update']);
    Route::get('/delete-report/{id}', [C_Reports::class, 'delete']);

    // articles
    Route::get('/articles', [C_Articles::class, 'index'])->name('articles');
    Route::get('/add-articles', [C_Articles::class, 'add']);
    Route::post('/insert-articles', [C_Articles::class, 'insert']);
    Route::get('/edit-articles/{id}', [C_Articles::class, 'edit']);
    Route::post('/update-articles/{id}', [C_Articles::class, 'update']);
    Route::get('/delete-articles/{id}', [C_Articles::class, 'delete']);
    Route::get('/detail-articles/{id}', [C_Articles::class, 'detail']);

    // news
    Route::get('/news', [C_News::class, 'index'])->name('news');
    Route::get('/add-news', [C_News::class, 'add']);
    Route::post('/insert-news', [C_News::class, 'insert']);
    Route::get('/edit-news/{id}', [C_News::class, 'edit']);
    Route::post('/update-news/{id}', [C_News::class, 'update']);
    Route::get('/detail-news/{id}', [C_News::class, 'detail']);
    Route::get('/delete-news/{id}', [C_News::class, 'delete']);

    // users
    Route::get('/users', [C_Users::class, 'index'])->name('users');
    Route::get('/add-user', [C_Users::class, 'add']);
    Route::post('/insert-user', [C_Users::class, 'insert']);
    Route::get('/edit-user/{id}', [C_Users::class, 'edit']);
    Route::get('/detail-user/{id}', [C_Users::class, 'detail']);
    Route::post('/update-user/{id}', [C_Users::class, 'update']);
    Route::get('/delete-user/{id}', [C_Users::class, 'delete']);
    Route::get('/destinations-user/{id}', [C_Users::class, 'destination_edit']);
    Route::post('/destinations-update-user/{id}', [C_Users::class, 'destination_update']);

    // partner
    Route::get('/partner', [C_Partner::class, 'index'])->name('partner');
    Route::get('/add-partner', [C_Partner::class, 'add']);
    Route::post('/insert-partner', [C_Partner::class, 'insert']);
    Route::get('/edit-partner/{id}', [C_Partner::class, 'edit']);
    Route::post('/update-partner/{id}', [C_Partner::class, 'update']);
    Route::get('/delete-partner/{id}', [C_Partner::class, 'delete']);

    // profile
    Route::get('/profile', [C_Users::class, 'myProfile'])->name('profile');
    Route::post('/update-profile/{id}', [C_Users::class, 'updateProfile']);
    Route::post('/update-password/{id}', [C_Users::class, 'updatePassword']);
});
