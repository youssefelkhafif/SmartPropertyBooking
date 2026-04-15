<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes (LOGIN / LOGOUT / REGISTER) 🔥
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Dashboard (Protected)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |------------------------------------------
    | Profile (Breeze)
    |------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |------------------------------------------
    | Calendar Page
    |------------------------------------------
    */
    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');

    /*
    |------------------------------------------
    | Visits API
    |------------------------------------------
    */
    Route::get('/visits', [VisitController::class, 'index']);
    Route::post('/visits', [VisitController::class, 'store']);
    Route::put('/visits/{visit}', [VisitController::class, 'update']);
    Route::delete('/visits/{visit}', [VisitController::class, 'destroy']);

    /*
    |------------------------------------------
    | Fake Payment
    |------------------------------------------
    */
    Route::get('/payment/{visit}', [VisitController::class, 'paymentPage'])
        ->name('payment.page');

    Route::post('/payment/{visit}', [VisitController::class, 'processPayment'])
        ->name('payment.process');
});