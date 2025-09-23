<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});



Route::resource('medewerkers', MedewerkerController::class);

Route::resource('producten', ProductController::class)->parameters([
    'producten' => 'product'
]);
