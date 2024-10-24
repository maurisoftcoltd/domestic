<?php

use App\Http\Controllers\DataPointController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('get_all_data_points', [DataPointController::class, 'get_all_data_points'])->name('get_all_data_points');


Route::get('data-points/delete', [App\Http\Controllers\DataPointController::class, 'delete']);
Route::resource('data-points', App\Http\Controllers\DataPointController::class)->only('index', 'create', 'store');
