<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
 
Route::resource('city', CityController::class);
Route::resource('country', CountryController::class);

Route::get('/', function () {
    return view('welcome');
});