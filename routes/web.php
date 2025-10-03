<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveringenController;
use App\Http\Controllers\SandwichController;
use App\Http\Controllers\TafelController;
<<<<<<< HEAD

/*
|--------------------------------------------------------------------------
| Klant routes
|--------------------------------------------------------------------------
|
| Klanten kunnen alleen reserveringen maken.
|
*/

// Startpagina voor klant: direct naar reservering maken
Route::get('/', function () {
    return redirect()->route('reserveringen.create');
});

// Testpagina
=======
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DrankController;

Route::get('/', function () {
    return view('home');
});


>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543
Route::get('/test', function () {
    return view('test');
});

// Resource routes
Route::resource('medewerkers', MedewerkerController::class);
Route::resource('producten', ProductController::class)->parameters([
    'producten' => 'product'
]);
Route::resource('reserveringen', ReserveringenController::class)->parameters([
    'reserveringen' => 'reservering'
]);
Route::resource('sandwiches', SandwichController::class);
<<<<<<< HEAD
=======

>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543
Route::resource('tafels', TafelController::class)->parameters([
    'tafels' => 'tafel'
]);

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
|
| Alleen beheerders (auth middleware) kunnen alle reserveringen beheren:
| bekijken, bewerken, en verwijderen.
|
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Admin reserveringen CRUD
    Route::resource('reserveringen', ReserveringenController::class)->parameters([
        'reserveringen' => 'reservering'
    ]);

    // Admin tafels CRUD (optioneel)
    Route::resource('tafels', TafelController::class)->parameters([
        'tafels' => 'tafel'
    ]);

    // Admin overige resources
    Route::resource('producten', ProductController::class)->parameters([
        'producten' => 'product'
    ]);
    Route::resource('medewerkers', MedewerkerController::class);
    Route::resource('sandwiches', SandwichController::class);
});
=======
Route::resource('reviews', ReviewController::class)->parameters([
    'reviews' => 'review'
]);
>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543

Route::resource('dranken', DrankController::class)->parameters([
    'dranken' => 'drank'
]);
