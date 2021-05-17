<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarParking;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parking_lot_size = CarParking::getLotSize();
        $available_lot_size = CarParking::getAvailableLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }
        $cars = CarParking::getParkedCars();
        //return $cars;
        return view('cars.index', ['cars' => $cars, 'parking_lot_size' => $parking_lot_size, 'available_lot_size' => $available_lot_size]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }
        
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }

        $validated_request = $request->validate([
            'license' => 'required|string',
            'time'=>'required',
            'entry_date' => 'required|string',
            'entry_time' => 'required|string',
            'fee'=>'required'
        ]);

        CarParking::parkNewCar($validated_request);
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }
        
        $car = CarParking::getCarByToken($token);
        if(count($car) == 0) {
            return redirect()->back()->withErrors('Invalid/Inactive Token');
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $token
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }

        $car = CarParking::getCarByToken($token);
        if(count($car) == 0) {
            return redirect()->back()->withErrors('Invalid/Inactive Token');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }
    
        $car = CarParking::getCarByToken($token);
        if(count($car) == 0) {
            return redirect()->back()->withErrors('Invalid/Inactive Token');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $token)
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }
        
        $car = CarParking::getCarByToken($token);
        if(count($car) == 0) {
            return redirect()->back()->withErrors('Invalid/Inactive Token');
        }

        $validated_request = $request->validate([
            'exit_date' => 'required|string',
            'exit_time' => 'required|string',
        ]);
        CarParking::displaceCarByToken($token);
        return redirect()->route('cars.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displacing($token)
    {
        $parking_lot_size = CarParking::getLotSize();
        if ($parking_lot_size <= 0) {
            return redirect()->route('run-system');
        }

        $car = CarParking::getCarByToken($token);
        if(count($car) == 0) {
            return redirect()->back()->withErrors('Invalid/Inactive Token');
        }

        return view('cars.displacing', ['car' => $car]);
    }
}
