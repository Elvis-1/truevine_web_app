<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('index');
});

Route::view('/login', 'admin');
Route::get('/youth', [UserController::class, 'index']);
Route::view('/gallery', 'gallery');
// Route::get('/youth/{user}', [UserController::class, 'show']);

Route::middleware(['auth:admin'])->group(function () {
    Route::view('/add_member', 'add_member');
    //  Route::get('/edit_member/{user}', [UserController::class,'edit_view']);
    //  Route::post('/update/{user}', [UserController::class,'update']);
    // Route::get('/delete_member/{id}',  [UserController::class,'delete_view']);
    // Route::post('/delete/{id}',  [UserController::class,'delete']);
});

// Admin Route
Route::get('/generate_link',[AdminController::class,'generate_link'] )->name('generate');
Route::post('/admin_auth',[AdminController::class,'login']);

// User Route
Route::get('/edit_member/{user}', [UserController::class,'edit_view']);
Route::post('/update/{user}', [UserController::class,'update']);
Route::get('/delete_member/{id}',  [UserController::class,'delete_view']);
Route::post('/delete/{id}',  [UserController::class,'delete']);
Route::post('/store', [UserController::class,'store']);
Route::get('/search', [UserController::class,'search']);






Route::fallback(function () {
    return view('/errors/fallback_page');
});
