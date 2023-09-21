<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ParkingLotController;

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
});

Route::get('/parking-lot-management', [ParkingLotController::class, 'index'])->name('parking-lot-management');
