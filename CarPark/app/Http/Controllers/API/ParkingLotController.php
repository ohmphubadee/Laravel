<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ParkingLot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParkingLotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkingLot = ParkingLot::all();
        return view('parking-lot-management', ['parkingLot' => $parkingLot]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'free_time_minutes' => 'required|integer',
            'rate_per_hour' => 'required|numeric',
        ]);
        ParkingLot::create($request->all());

        return redirect()->route('parking-lot-management');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $parkingLot = ParkingLot::find($id);
        if ($parkingLot) {
            return view('parking-lot-management', compact('parkingLot'));
        } else {
            return redirect()->route('some-other-route')->with('error', 'Parking Lot Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParkingLot $parkingLot)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $parkingLot = ParkingLot::find($id);
        $parkingLot->delete();
        return redirect()->route('parking-lot-management');
    }

    public function getNearbyParkingLot(Request $request)
    {
        $userLat = $request->query('lat'); // user position in latitude
        $userLng = $request->query('lng'); // user position in longitude
        $distance_filter = $request->query('distance_filter', 5); // user filter parking distance

        if (is_null($userLat) || is_null($userLng)) {
            return response()->json(['data' => ParkingLot::all()->pluck('name')]); //return all parking if user position is null
        }
        
        // return praking that match the distance in km defualt 5 km. 
        $parkingLots = ParkingLot::select('name')
            ->selectRaw("(6371 * acos(
                cos(radians(?)) * 
                cos(radians(lat)) * 
                cos(radians(`long`) - radians(?)) + 
                sin(radians(?)) * 
                sin(radians(lat))
            )) AS distance", [$userLat, $userLng, $userLat])
            ->havingRaw("distance < $distance_filter")
            ->orderBy('distance', 'asc')
            ->get();

        return response()->json(['data' => $parkingLots]);

    }

    public function getParkingLotDetail($id)
    {
        $parkingLot = ParkingLot::find($id);

        if ($parkingLot) {
            return response()->json(['data' => $parkingLot]); // return parking detail filter by parking id
        } else {
            return response()->json(['error' => 'Parking lot not found'], 404); // if parking id does not exist return 404
        }
    }
}
