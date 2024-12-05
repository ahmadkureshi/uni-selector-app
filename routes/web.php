<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
 * Frontend Controllers
 * */
use App\Http\Controllers\HomeController;

/*
 * BackendControllers
 * */
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UniversityController;
use App\Http\Controllers\Backend\DegreeProgramController;

/*
 * Home Screen Route
 * */
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/merit-for/{uni}', [HomeController::class, 'meritFor'])->name('merit.for');
/*
 * Auth Routes
 *  */
Route::middleware(['auth'])->group(function () {

    /*
     * Admin Routes
     * */
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('universities', UniversityController::class)->names('backend.universities');
        Route::resource('degree-programs', DegreeProgramController::class)->names('backend.degree-programs');
    });

    /*
     * User Routes
     * */
    Route::prefix('user')->middleware('role:user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    });
});

/*
 *  Laravel Breeze Non Required Routes
 *  */

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';
