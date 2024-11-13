<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {  return view('auth.login');});


    Route::middleware('auth')->group(function () {

        Route::get('/dashboard',DashboardController::class)->middleware(['auth'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::resource('account',AccountController::class);
        Route::post('/account/reject/{id}',[AccountController::class,'reject'])->name('account.reject');
        Route::post('/account/approve/{id}',[AccountController::class,'approve'])->name('account.approve');


        Route::resource('cards', CardController::class);
        Route::post('/cards/cardcollected/{id}',[CardController::class,'cardcollected'])->name('cards.cardcollected');

    });

    require __DIR__.'/auth.php';
});
