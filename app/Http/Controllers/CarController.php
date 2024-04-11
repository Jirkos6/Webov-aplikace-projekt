<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function test()
    {
        $cars = Car::all();
        return view('test', ['cars' => $cars]);
    }
}