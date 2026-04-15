<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ProfileController;
use App\Models\Place;
use Illuminate\Http\Request;

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
| Dashboard (SHOW PLACES)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $places = Place::all();
    return view('dashboard', compact('places'));
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |------------------------------------------
    | Profile
    |------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |------------------------------------------
    | Calendar (RECEIVE PLACE)
    |------------------------------------------
    */
    Route::get('/calendar', function (Request $request) {

        $place = null;

        if ($request->has('place_id')) {
            $place = Place::find($request->place_id);
        }

        return view('calendar', compact('place'));

    })->name('calendar');

    /*
    |------------------------------------------
    | Visits API
    |------------------------------------------
    */
    Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
    Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
    Route::put('/visits/{visit}', [VisitController::class, 'update'])->name('visits.update');
    Route::delete('/visits/{visit}', [VisitController::class, 'destroy'])->name('visits.destroy');

    /*
    |------------------------------------------
    | Stripe Payment
    |------------------------------------------
    */
    Route::get('/checkout/{visit}', [VisitController::class, 'checkout'])->name('checkout');

    Route::get('/payment/success/{visit}', [VisitController::class, 'success'])->name('payment.success');

    Route::get('/payment/cancel/{visit}', [VisitController::class, 'cancel'])->name('payment.cancel');

});