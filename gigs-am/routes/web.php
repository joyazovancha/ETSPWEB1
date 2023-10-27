<?php

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
//
//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/gigs', [App\Http\Controllers\FrontController::class, 'indexEvent'])->name('indexGigs');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\FrontController::class, 'dashboard'])->name('dashboard');
    Route::get('/gigs/detail/{id}', [App\Http\Controllers\FrontController::class, 'detailEvent'])->name('detailGigs');

    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');


Route::get('event', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
Route::get('event/create', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
Route::post('event/store', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
Route::get('event/edit/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
Route::get('event/show/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
Route::put('event/update/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
Route::get('event/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('event.destroy');
});
