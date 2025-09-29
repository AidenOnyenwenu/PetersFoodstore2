<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveringenController;

// Voor testpagina
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


