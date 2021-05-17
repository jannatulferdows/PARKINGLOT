<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarParking;

class SystemController extends Controller
{
    public function runSystem()
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return view('runSystem');
        }
        
        return redirect()->route('cars.index');
    }
    public function startSystem(Request $request)
    {
        $validated_request = $request->validate([
            'lot_size' => 'required|numeric|min:5',
        ]);

        $available_lot_size = $validated_request['lot_size'];

        CarParking::setLotSize($available_lot_size);
        CarParking::setAvailableLotSize($available_lot_size);
        CarParking::setEmptyParking();

        return redirect()->route('cars.index');
    }
    public function stopSystem(Request $request)
    {
        CarParking::setStopSystem();
        return redirect()->route('run-system');
    }
}
