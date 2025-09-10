<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedewerkerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});



Route::resource('medewerkers', MedewerkerController::class);
