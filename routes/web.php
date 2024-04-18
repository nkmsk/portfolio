<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WorkController;
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

Route::controller(GuestController::class)->group( function () {
    Route::get('/home', 'home');
    Route::get('/about', 'about');
    Route::get('/works', 'indexWorks')->name('guest.works.index');
    Route::get('/works/{id}/show', 'showWorks')->name('guest.works.show');
    Route::get('/contact', 'contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group( function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    Route::controller(SocialController::class)->group( function () {
        Route::get('/social', 'edit')->name('social.edit');
        Route::patch('/social', 'update')->name('social.update');
    });
    Route::controller(WorkController::class)->group( function () {
        Route::get('/works/index', 'index')->name('works.index');
        Route::get('/works/create', 'create')->name('works.create');
        Route::post('/works/store', 'store')->name('works.store');
        Route::get('/works/{id}/edit', 'edit')->name('works.edit');
        Route::patch('/works/{id}', 'update')->name('works.update');
        Route::delete('/works/{id}', 'destroy')->name('works.destroy');
    });
});

require __DIR__.'/auth.php';
