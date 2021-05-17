<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarParking extends Model
{
    public static function getLotSize()
    {
        $parking_lot_size = session('parking_lot_size', 0);
        return $parking_lot_size;
    }
    public static function setLotSize($size = 0)
    {
        session(['parking_lot_size' => $size]);
    }
    public static function setStopSystem()
    {
        session()->forget('available_lot_size');
        session()->forget('parking_lot_size');
        session()->forget('cars');
    }
    

    public static function setEmptyParking()
    {
        session(['cars' => []]);
    }
    public static function getParkedCars()
    {
        $cars = session('cars', []);
        return $cars;
    }

    
    public static function setAvailableLotSize($size = 0)
    {
        session(['available_lot_size' => $size]);
    }
    public static function getAvailableLotSize()
    {
        $available_lot_size = session('available_lot_size', 0);
        return $available_lot_size;
    }


    public static function parkNewCar($carArray = [])
    {
        $cars = session('cars', []);
        
        // find max token number.
        $keys = array_column($cars, 'token');
        array_multisort($keys, SORT_ASC, $cars);
        $token = 1;
        foreach ($cars as $car) {
            if($car['token'] == $token) {
                $token++;
            }
        }
        $carArray['token'] = $token;
        
        // create new car with new token
        
        $available_lot_size = session('available_lot_size', 0);
        if($available_lot_size > 0) {
            $available_lot_size --;
            array_push($cars, $carArray);
            session(['cars' => $cars, 'available_lot_size' => $available_lot_size]);
        }
    }
    public static function getCarByToken($token)
    {
        $cars = session('cars', []);
        $key = array_search($token, array_column($cars, 'token'));
        $car = [];
        if(gettype($key) != 'boolean' && $key >= 0) {
            $car = $cars[$key];
        }
        return $car;
    }
    public static function displaceCarByToken($token)
    {
        $cars = session('cars', []);
        $key = array_search($token, array_column($cars, 'token'));
        $newCars = array_filter($cars, function($car) use ($token) {
            return ($car['token'] != $token);
        });
        
        $parking_lot_size = session('parking_lot_size', 0);
        $available_lot_size = $parking_lot_size - count($newCars);
        session(['cars' => $newCars, 'available_lot_size' => $available_lot_size]);
    }
}
