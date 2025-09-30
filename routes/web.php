<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveringenController;
use App\Http\Controllers\SandwichController;
use App\Http\Controllers\TafelController; // ✅ toegevoegd

// Redirect home naar ReserveringenController
Route::get('/', function () {
    return view('home');
});


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

// ✅ nieuwe route voor tafels
Route::resource('tafels', TafelController::class)->parameters([
    'tafels' => 'tafel'
]);


