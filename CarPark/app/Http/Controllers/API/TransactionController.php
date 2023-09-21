<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingLot;
use App\Models\ParkingSlot;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkIn(Request $request)
    {
        $parking_lot_id = $request->input('parking_lot_id'); // user should parking
        $slot_number = $request->input('slot_number'); // user should slot

        // check the slot is existing
        $slot = ParkingSlot::where([
            ['parking_lot_id', '=', $parking_lot_id],
            ['slot_number', '=', $slot_number]
            ])->first();

        if (!$slot) {
            // If the slot is not found, return a 404 Not Found response
            return response()->json(['message' => 'Parking slot not found'], 404);
        }

        if ($slot->status === 'occupied') {
            // If the slot is already occupied, return a 400 Bad Request response
            return response()->json(['message' => 'Parking slot is already occupied'], 400);
        }
        
        // check-in, time record in transaction table
        $transaction = Transaction::create([
            'parking_lot_id' => $parking_lot_id,
            'parking_slot_id' => $slot->id,
            'check_in_time' => Carbon::now(),
        ]);

        // change slot's status to occupied
        $slot->status = 'occupied';
        $slot->save();
        
        return response()->json($transaction, 201);
    }

    public function checkOut(Request $request)
    {   
        $transactionId = $request->input('transactionId'); // get transaction id
        $transaction = Transaction::find($transactionId);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $checkInTime = Carbon::parse($transaction->check_in_time); // get check-in time
        $duration = $checkInTime->diffInMinutes(Carbon::now()); // calculate duration between check-in and out

        $parkingLot = ParkingLot::find($transaction->parking_lot_id); // get parking id

        $freeTimeMin = $parkingLot-> free_time_minutes; // free time in minute

        $ratePerHour = $parkingLot-> rate_per_hour; // price per hour

        // calculate the price
        if ($duration <= $freeTimeMin) {
            $totalCharge = 0;
        } 

        else {
            $totalCharge = ceil($duration / 60) * $ratePerHour;
        }

        // update data in transaction table
        $transaction->update([
            'check_out_time' => Carbon::now(),
            'total_charge' => $totalCharge,
        ]);

        // Update the status of the parking slot back to 'available'
        $parkingSlot = ParkingSlot::find($transaction->parking_slot_id);
        if ($parkingSlot) {
            $parkingSlot->status = 'available';
            $parkingSlot->save();
        }

        return response()->json([
            'duration' => $duration,
            'transaction' => $transaction,
        ], 200);
    }

    public function getSummary(Request $request)
    {
        $fromDate = $request->input('from_date'); // get date's filter
        $toDate = $request->input('to_date');

        // count total price each parking
        $query = Transaction::select('parking_lot_id', DB::raw('SUM(total_charge) as total_charge'))
            ->groupBy('parking_lot_id')
            ->havingRaw('SUM(total_charge) >= 0');

        if ($fromDate && $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $result = $query->get();

        return response()->json(['data' => $result]);
    }
}
