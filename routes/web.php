<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkHistoryController;
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
    Route::controller(AboutController::class)->group( function () {
        Route::get('/about/setting', 'edit')->name('about.edit');
        Route::patch('/about/setting', 'update')->name('about.update');
    });

    Route::controller(SkillController::class)->group( function () {
        Route::get('/skills/index', 'index')->name('skills.index');
        Route::get('/skills/create', 'create')->name('skills.create');
        Route::post('/skills/store', 'store')->name('skills.store');
        Route::get('/skills/{id}/edit', 'edit')->name('skills.edit');
        Route::patch('/skills/{id}', 'update')->name('skills.update');
        Route::delete('/skills/{id}', 'destroy')->name('skills.destroy');
    });

    Route::controller(WorkHistoryController::class)->group( function () {
        Route::get('/work_histories/index', 'index')->name('work_histories.index');
        Route::get('/work_histories/create', 'create')->name('work_histories.create');
        Route::post('/work_histories/store', 'store')->name('work_histories.store');
        Route::get('/work_histories/{id}/edit', 'edit')->name('work_histories.edit');
        Route::patch('/work_histories/{id}', 'update')->name('work_histories.update');
        Route::delete('/work_histories/{id}', 'destroy')->name('work_histories.destroy');
    });
});

Route::middleware('auth', 'admin')->group(function () {
    Route::controller(ProfileController::class)->group( function () {
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
