<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees',[EmployeesController::class,'employees_list']);
Route::post('/add',[EmployeesController::class,'employee_add'])->name('addemployee');
Route::post('/delete',[EmployeesController::class,'employee_delete'])->name('deleteemployee');

Route::get('/orders',[OrderController::class,'orders_list']);
Route::post('/addorder',[OrderController::class,'order_add'])->name('addorder');
Route::post('/deleteorder',[OrderController::class,'order_delete'])->name('deleteorder');

Route::get('/detail',[OrderController::class,'order']);