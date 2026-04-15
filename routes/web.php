<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ProfileController;
use App\Models\Place;

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
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |------------------------------------------
    | ✅ DASHBOARD (SHOW PLACES)
    |------------------------------------------
    */
    Route::get('/dashboard', function () {
        $places = Place::latest()->get(); // 🔥 IMPORTANT
        return view('dashboard', compact('places'));
    })->name('dashboard');


    /*
    |------------------------------------------
    | ✅ CALENDAR (SEPARATE PAGE)
    |------------------------------------------
    */
    Route::get('/calendar', [VisitController::class, 'index'])
        ->name('calendar');


    /*
    |------------------------------------------
    | ✅ VISITS API (FOR FULLCALENDAR)
    |------------------------------------------
    */
    Route::get('/visits', [VisitController::class, 'getVisits'])
        ->name('visits.index');

    Route::post('/visits', [VisitController::class, 'store'])
        ->name('visits.store');

    Route::delete('/visits/{visit}', [VisitController::class, 'destroy'])
        ->name('visits.destroy');


    /*
    |------------------------------------------
    | ✅ STRIPE PAYMENT
    |------------------------------------------
    */
    Route::get('/checkout/{visit}', [VisitController::class, 'checkout'])
        ->name('checkout');

    Route::get('/payment/success/{visit}', [VisitController::class, 'success'])
        ->name('payment.success');

    Route::get('/payment/cancel/{visit}', [VisitController::class, 'cancel'])
        ->name('payment.cancel');


    /*
    |------------------------------------------
    | Profile
    |------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});