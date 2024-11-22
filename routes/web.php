<?php

use App\Http\Controllers\DataPointController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');



Route::get('get_all_data_points', [DataPointController::class, 'get_all_data_points'])->name('get_all_data_points');


Route::resource('data-points', App\Http\Controllers\DataPointController::class);
Route::resource('towns', App\Http\Controllers\TownController::class);
