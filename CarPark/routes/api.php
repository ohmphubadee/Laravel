<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ParkingLotController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\ParkingSlotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('parking-lots', [ParkingLotController::class,'store']); // store parking
Route::delete('parking-lots/delete/{id}',[ParkingLotController::class,'destroy']); // delete parking
Route::get('/parking-lots/nearby',[ParkingLotController::class,'getNearbyParkingLot']); // check user nearby parking : API สำหรับเรียกดูข้อมูลลิสต์ที่จอดรถใกล้กับ user
Route::get('/parking-lots/{id}',[ParkingLotController::class,'getParkingLotDetail']); // check parking detail : API สำหรับเรียกดูรายละเอียดที่จอดรถแต่ละแห่ง

Route::post('/transaction/checkin',[TransactionController::class,'checkIn']);  // Check in parking : API สำหรับการ check-in เข้าที่จอดรถ
Route::post('/transaction/checkout',[TransactionController::class,'checkOut']); // Check out parking : API สำหรับการ check-out จากที่จอดรถและคำนวณค่าบริการ
Route::post('/transaction/summary',[TransactionController::class,'getSummary']); // Report : API สำหรับการการดู report รายได้ของแต่ละที่จอดรถ เป็น รายวัน สัปดาห์ เดือน

Route::post('/parking-slots/store',[ParkingSlotController::class,'store']); // Store slot each park

Route::get('/test', function() {
    return response()->json(['message' => 'Test successful']);
});