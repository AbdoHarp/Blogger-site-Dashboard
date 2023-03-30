<?php

use App\Http\Controllers\Admin\categories\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Posts\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth', 'theAdmin'])->prefix('admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/add_category', 'create');
        Route::post('/add_category', 'store');
        Route::get('/edit_category/{category_id}', 'edit');
        Route::put('/edit_category/{category_id}', 'update');
        Route::get('/delete_category/{category_id}', 'destroy');
    });
    Route::controller(PostController::class)->group(function () {
        Route::get('/post', 'index');
        Route::get('/add_post', 'create');
        Route::post('/add_post', 'store');
        Route::get('/edit_post/{post_id}', 'edit');
        Route::put('/edit_post/{post_id}', 'update');
        Route::get('/delete_post/{post_id}', 'destroy');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
