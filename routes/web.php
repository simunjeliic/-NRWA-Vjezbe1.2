<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AdminUserController;
 
Route::resource('city', CityController::class);
Route::resource('country', CountryController::class);
Route::resource('admin', AdminUserController::class);
Route::post('addrole/{id}', [AdminUserController::class, 'addrole'])->name('addrole');
Route::post('destroyrole/{id}', [AdminUserController::class, 'destroyrole'])->name('destroyrole');
Route::get('deleterole/{id}', [AdminUserController::class, 'deleterole'])->name('deleterole');




Route::get('/', function () {
    return view('welcome');
});