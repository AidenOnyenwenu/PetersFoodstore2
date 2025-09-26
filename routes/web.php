<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SandwichController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});



Route::resource('medewerkers', MedewerkerController::class);

Route::resource('producten', ProductController::class)->parameters([
    'producten' => 'product'
]);

Route::resource('sandwiches', SandwichController::class);
